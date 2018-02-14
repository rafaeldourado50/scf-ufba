<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Excel;
use App\Plano;
use App\Aluno;
use App\Aula;
use Auth;


class ExcelController extends Controller
{

    public function getImport(){
    	return view('plano.create');
    }

    public function postImport(){

    	$alunos = Excel::load(Input::file('file'), function($reader){
    	})->get();

        //criando o plano
        $plano = new Plano();

        $plano->user_id = Auth::user()->id;        
        $plano->curso = $alunos->first()->curso;           
        $plano->semestre = $alunos->first()->semestre;       
        $plano->carga_horaria = $alunos->first()->carga_horaria;
        
        $plano->save();

        for($i = $plano->carga_horaria; $i > 0; $i--){
            $aula = new Aula();

            $aula->plano_id = $plano->id;
            $aula->data = "";
            $aula->tema = "";
            $aula->descricao = "";
            
            $aula->save();
        }

        //criando os alunos
        foreach ($alunos as $aluno) {
                

                $novoAluno = new Aluno();

                $novoAluno->plano_id = $plano->id;
                $novoAluno->nome = $aluno->nome;
                $novoAluno->email = $aluno->email;
                $novoAluno->faltas = 0;

                $novoAluno->save();
        }

        //pegando variaveis


        return redirect("/plano/$plano->id");
    }
}
