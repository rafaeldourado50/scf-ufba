<?php

namespace App\Http\Controllers;

use App\Aula;
use App\Plano;

use Illuminate\Http\Request;

class AulaController extends Controller
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
     * @return  \Illuminate\Http\Response
     */
    public function index($plano_id)
    {
        $plano = Plano::findOrFail($plano_id);

        return view('aula.index', compact('plano'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create($plano_id)
    {
        $plano = Plano::findOrFail($plano_id);

        return view('aula.create', compact('plano'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $plano_id
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request, $plano_id)
    {
        $this->validate($request, [
            'data' => 'required',
            'tema' => 'required',
            'descricao' => 'required',
        ]);

        $aula = new Aula();
        $aula->plano_id = $plano_id;
        $aula->data = $request->data;
        $aula->tema = $request->tema;
        $aula->descricao = $request->descricao;
        $aula->save();

        return redirect('plano/' . $plano_id . '/aula')->with('success', 'Aula cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $plano_id
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($plano_id, $id)
    {
        $aula = Aula::findOrfail($id);
        $plano = Plano::findOrfail($plano_id);

        return view('aula.show', compact('aula', 'plano'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $plano_id
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($plano_id, $id)
    {
        $aula = Aula::findOrfail($id);
        $plano = Plano::findOrfail($plano_id);

        return view('aula.edit', compact('aula', 'plano'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $plano_id
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $plano_id, $id)
    {
        $this->validate($request, [
            'data' => 'required',
            'tema' => 'required',
            'descricao' => 'required',
        ]);

        $aula = Aula::findOrFail($id);
        $aula->plano_id = $plano_id;
        $aula->data = $request->data;
        $aula->tema = $request->tema;
        $aula->descricao = $request->descricao;
        $aula->save();

        return redirect('plano/' . $plano_id . '/aula')->with('success', 'Aula atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $plano_id
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($plano_id, $id)
    {
        Aula::destroy($id);

        return redirect('plano/' . $plano_id . '/aula')->with('success', 'Aula removida com sucesso!');
    }
}
