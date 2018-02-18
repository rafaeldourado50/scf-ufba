<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Aula;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChamadaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @return  \Illuminate\Http\Response
     */
    public function index($plano_id, $aula_id)
    {
        $plano = DB::table('planos')
            ->join('turmas', 'turmas.id', '=', 'planos.turma_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'turmas.disciplina_id')
            ->where('planos.id', '=', $plano_id)
            ->select('planos.id', 'disciplinas.codigo as codigo_disciplina', 'disciplinas.nome', 'turmas.codigo as codigo_turma'
                , 'planos.semestre', 'disciplinas.carga_horaria')
            ->first();

        $aula = Aula::findOrFail($aula_id);
        $alunos = Aluno::where('plano_id', '=', $plano_id)->get();

        return view('chamada.index', compact('plano', 'aula', 'alunos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @param    int  $aluno_id
     * @return  \Illuminate\Http\Response
     */
    public function check($plano_id, $aula_id, $aluno_id)
    {
        $aluno = Aluno::findOrfail($aluno_id);

        if($aluno->faltas > 0){
            $aluno->faltas = $aluno->faltas - 1;
            $aluno->save();
        }

        $alunos = Aluno::where('plano_id', '=', $plano_id)->get();

        return redirect('plano/' . $plano_id . '/aula/' . $aula_id . '/aluno');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @param    int  $aluno_id
     * @return  \Illuminate\Http\Response
     */
    public function uncheck($plano_id, $aula_id, $aluno_id)
    {
        $aluno = Aluno::findOrfail($aluno_id);

        $aluno->faltas = $aluno->faltas + 1;
        $aluno->save();

        $alunos = Aluno::where('plano_id', '=', $plano_id)->get();

        return redirect('plano/' . $plano_id . '/aula/' . $aula_id . '/aluno');
    }


}
