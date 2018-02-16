<?php

namespace App\Http\Controllers;

use Auth;
use Excel;

use App\Aluno;
use App\Aula;
use App\Disciplina;
use App\Horario;
use App\Plano;
use App\Turma;

use Carbon\Carbon;

use Illuminate\Support\Facades\Input;

class ExcelController extends Controller
{

    public function import()
    {
    	return view('excel.import');
    }

    public function store()
    {
        $result = Excel::load(Input::file('file'), function($reader) {

        })->get();

        $semestre = $result->first()->semestre;
        $codigo_disciplina = $result->first()->disciplina;
        $codigo_turma = $result->first()->turma;

        $disciplina = Disciplina::where('codigo', '=', $codigo_disciplina)->first();

        $turma = Turma::where([
            ['codigo', '=', $codigo_turma],
            ['disciplina_id', '=', $disciplina->id],
        ])->first();

        // criando o plano
        $plano = new Plano();
        $plano->user_id = Auth::user()->id;
        $plano->semestre = $semestre;
        $plano->turma_id = $turma->id;
        $plano->save();

        // criando as aulas
        $this->storeClassesList($turma, $plano);

        // criando os alunos
        $this->storeStudentsList($result, $plano);

        return redirect("plano")->with('success', 'Plano importado com sucesso!');;
    }

    /**
     * @param $result
     * @param $plano
     */
    public function storeStudentsList($result, $plano)
    {
        foreach ($result as $row) {
            $aluno = new Aluno();
            $aluno->plano_id = $plano->id;
            $aluno->matricula = $row->matricula;
            $aluno->nome = $row->nome;
            $aluno->email = $row->email;
            $aluno->faltas = 0;
            $aluno->save();
        }
    }

    /**
     * @param $turma
     * @param $plano
     */
    public function storeClassesList($turma, $plano)
    {
        $horarios = Horario::where('turma_id', '=', $turma->id)->orderBy('dia')->get();

        $data_ini = Carbon::createFromDate(2017, 10, 02);
        $data_fim = Carbon::createFromDate(2018, 02, 24);

        while ($data_ini->diffInDays($data_fim, false) > 0) {

            $data_atual = $data_ini->copy();

            foreach ($horarios as $horario) {

                $diff = $horario->dia - $data_atual->dayOfWeek;
                if ($diff > 0) {
                    $data_atual->addDays($diff);
                }

                $aula = new Aula();
                $aula->plano_id = $plano->id;
                $aula->data = Carbon::createFromFormat('Y-m-d H:i', $data_atual->year . '-' . $data_atual->month . '-' . $data_atual->day . ' ' .
                    $horario->hora_inicio . ':' . $horario->minuto_inicio);
                $aula->save();
            }

            $data_ini->addWeek();
        }
    }
}
