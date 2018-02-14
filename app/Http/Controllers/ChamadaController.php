<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chamada;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Aluno;


use App\Aula;


/**
 * Class ChamadaController.
 *
 * @author  The scaffold-interface created at 2018-02-08 11:37:27pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ChamadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - chamada';
        $chamadas = Chamada::paginate(6);
        return view('chamada.index',compact('chamadas','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - chamada';
        
        $alunos = Aluno::all()->pluck('nome','id');
        
        $aulas = Aula::all()->pluck('data','id');
        
        return view('chamada.create',compact('title','alunos' , 'aulas'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chamada = new Chamada();

        
        $chamada->falta = $request->falta;

        
        
        $chamada->aluno_id = $request->aluno_id;

        
        $chamada->aula_id = $request->aula_id;

        
        $chamada->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new chamada has been created !!']);

        return redirect('chamada');
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
        $title = 'Show - chamada';

        if($request->ajax())
        {
            return URL::to('chamada/'.$id);
        }

        $chamada = Chamada::findOrfail($id);
        return view('chamada.show',compact('title','chamada'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - chamada';
        if($request->ajax())
        {
            return URL::to('chamada/'. $id . '/edit');
        }

        
        $alunos = Aluno::all()->pluck('nome','id');

        
        $aulas = Aula::all()->pluck('data','id');

        
        $chamada = Chamada::findOrfail($id);
        return view('chamada.edit',compact('title','chamada' ,'alunos', 'aulas' ) );
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
        $chamada = Chamada::findOrfail($id);
    	
        $chamada->falta = $request->falta;
        
        
        $chamada->aluno_id = $request->aluno_id;

        
        $chamada->aula_id = $request->aula_id;

        
        $chamada->save();

        return redirect('chamada');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/chamada/'. $id . '/delete');

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
     	$chamada = Chamada::findOrfail($id);
     	$chamada->delete();
        return URL::to('chamada');
    }
}
