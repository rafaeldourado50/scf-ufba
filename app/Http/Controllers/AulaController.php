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
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'data' => 'required',
            'tema' => 'required',
            'descricao' => 'required',
        ]);

        $requestData = $request->all();

        Aula::create($requestData);

        return redirect('aula')->with('success', 'Aula cadastrada com sucesso!');
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
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'data' => 'required',
            'tema' => 'required',
            'descricao' => 'required',
        ]);

        $requestData = $request->all();

        $aula = Aula::findOrFail($id);
        $aula->update($requestData);

        return redirect('aula')->with('success', 'Aula atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aula::destroy($id);

        return redirect('aula')->with('success', 'Aula removida com sucesso!');
    }
}
