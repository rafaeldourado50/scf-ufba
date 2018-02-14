<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;
use App\Plano;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class AlunoController.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:06:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - aluno';
        $alunos = Aluno::paginate(6);
        return view('aluno.index',compact('alunos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - aluno';
        
        return view('aluno.create', compact($plano_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aluno = new Aluno();

        
        $aluno->plano_id = $request->plano_id;

        
        $aluno->nome = $request->nome;

        
        $aluno->email = $request->email;

        
        $aluno->faltas = $request->faltas;

        
        
        $aluno->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new aluno has been created !!']);
        $id = $request->plano_id;

        return view('aluno.create', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - aluno';

        if($request->ajax())
        {
            return URL::to('aluno/'.$id);
        }

        $aluno = Aluno::findOrfail($id);
        return view('aluno.show',compact('title','aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - aluno';
        if($request->ajax())
        {
            return URL::to('aluno/'. $id . '/edit');
        }

        
        $aluno = Aluno::findOrfail($id);
        return view('aluno.edit',compact('title','aluno'  ));
    }

    public function consulta($id)
    {
        $plano_id = $id;
        $title = 'Lista de Alunos';
        $alunos = Aluno::paginate(6);
        return view('aluno.index',compact('alunos','title','plano_id'));
    }

    public function registrar($id)
    {
        $aluno = Aluno::findOrfail($id);
        $plano = Plano::findOrfail($aluno->plano_id);
        if($aluno->faltas < $plano->carga_horaria){
            $aluno->faltas = $aluno->faltas + 1;
            $aluno->save();
        }        
        $plano_id = $plano->id;
        $title = 'Lista de Alunos';
        $alunos = Aluno::paginate(6);

        return view('aluno.chamada',compact('alunos','title','plano_id'));
    }

    public function desregistrar($id)
    {
        $aluno = Aluno::findOrfail($id);
        if($aluno->faltas > 0){
            $aluno->faltas = $aluno->faltas - 1;
            $aluno->save();
        }        
        $plano_id = $aluno->plano_id;
        $title = 'Lista de Alunos';
        $alunos = Aluno::paginate(6);

        return view('aluno.chamada',compact('alunos','title','plano_id'));
    }

    public function chamada($id)
    {
        $plano_id = $id;
        $title = 'Lista de Alunos';
        $alunos = Aluno::paginate(6);
        return view('aluno.chamada',compact('alunos','title','plano_id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $aluno = Aluno::findOrfail($id);
    	
        $aluno->plano_id = $request->plano_id;
        
        $aluno->nome = $request->nome;
        
        $aluno->email = $request->email;
        
        $aluno->faltas = $request->faltas;
        
        
        $aluno->save();

        return redirect('aluno');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/aluno/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$aluno = Aluno::findOrfail($id);
     	$aluno->delete();
        return redirect('aluno');
    }
}
