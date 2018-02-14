<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plano;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PlanoController.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:04:33pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class PlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - plano';
        $planos = Plano::paginate(6);
        return view('plano.index',compact('planos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - plano';
        
        return view('plano.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plano = new Plano();

        
        $plano->user_id = $request->user_id;

        
        $plano->curso = $request->curso;

        
        $plano->semestre = $request->semestre;

        
        $plano->carga_horaria = $request->carga_horaria;

        
        
        $plano->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new plano has been created !!']);

        $id = $plano->id;
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
        $title = 'Show - plano';

        if($request->ajax())
        {
            return URL::to('plano/'.$id);
        }

        $plano = Plano::findOrfail($id);
        return view('plano.show',compact('title','plano'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - plano';
        if($request->ajax())
        {
            return URL::to('plano/'. $id . '/edit');
        }

        
        $plano = Plano::findOrfail($id);
        return view('plano.edit',compact('title','plano'  ));
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
        $plano = Plano::findOrfail($id);
    	
        $plano->user_id = $request->user_id;
        
        $plano->curso = $request->curso;
        
        $plano->semestre = $request->semestre;
        
        $plano->carga_horaria = $request->carga_horaria;
        
        
        $plano->save();

        return redirect('plano/' .$plano->id .'#');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/plano/'. $id . '/delete');

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
     	$plano = Plano::findOrfail($id);
     	$plano->delete();
        return redirect('/plano');
    }
}
