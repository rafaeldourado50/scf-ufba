<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aula;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class AulaController.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:08:11pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - aula';
        $aulas = Aula::paginate(6);
        return view('aula.index',compact('aulas','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - aula';
        
        return view('aula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $n = $request->carga_horaria;
        if(isset($n)){
            for($i = $n; $i > 0; $i--){
                $aula = new Aula();
                $aula->plano_id = $request->plano_id;
                $aula->data = " ";
                $aula->tema = " ";
                $aula->descricao = "";

                $aula->save();
            }
        }
        else{
            $aula = new Aula();
            $aula->plano_id = $request->plano_id;
            $aula->data = $request->data;
            $aula->tema = $request->tema;
            $aula->descricao = $request->descricao;
            $aula->save();
        }

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new aula has been created !!']);

        return redirect('aula');
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
        $title = 'Show - aula';

        if($request->ajax())
        {
            return URL::to('aula/'.$id);
        }

        $aula = Aula::findOrfail($id);
        return view('aula.show',compact('title','aula'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - aula';
        if($request->ajax())
        {
            return URL::to('aula/'. $id . '/edit');
        }

        
        $aula = Aula::findOrfail($id);
        return view('aula.edit',compact('title','aula'  ));
    }

    public function consulta($id)
    {
        $plano_id = $id;
        $title = 'Lista de Aulas';
        $aulas = Aula::paginate(6);
        return view('aula.index',compact('aulas','title','plano_id'));
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
        $aula = Aula::findOrfail($id);
    	
        $aula->plano_id = $request->plano_id;
        
        $aula->data = $request->data;
        
        $aula->tema = $request->tema;
        
        $aula->descricao = $request->descricao;
        
        
        $aula->save();

        return redirect('aula');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/aula/'. $id . '/delete');

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
     	$aula = Aula::findOrfail($id);
     	$aula->delete();
        return redirect('aula');
    }
}
