<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Aula;
use App\Frequencia;

use Illuminate\Http\Request;

class FrequenciaController extends Controller
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
        $aula = Aula::findOrFail($aula_id);

        return view('frequencia.index', compact('plano_id', 'aula'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @return  \Illuminate\Http\Response
     */
    public function create($plano_id, $aula_id)
    {
        $aula = Aula::findOrFail($aula_id);
        $alunos = Aluno::where('plano_id', '=', $plano_id)->pluck('nome', 'id');

        return view('frequencia.create', compact('plano_id', 'aula', 'alunos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request, $plano_id, $aula_id)
    {
        $this->validate($request, [
            'falta' => 'required',
            'aluno' => 'required',
        ]);

        $frequencia = new Frequencia();
        $frequencia->falta = $request->falta;
        $frequencia->aluno_id = $request->aluno;
        $frequencia->aula_id = $aula_id;
        $frequencia->save();

        return redirect('plano/' . $plano_id . '/aula/' . $aula_id . '/frequencia')->with('success', 'Frequência cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($plano_id, $aula_id, $id)
    {
        $aula = Aula::findOrfail($aula_id);
        $frequencia = Frequencia::findOrfail($id);

        return view('frequencia.show', compact('plano_id', 'aula', 'frequencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($plano_id, $aula_id, $id)
    {
        $aula = Aula::findOrfail($aula_id);
        $alunos = Aluno::where('plano_id', '=', $plano_id)->pluck('nome', 'id');
        $frequencia = Frequencia::findOrfail($id);

        return view('frequencia.edit', compact('plano_id', 'aula', 'alunos', 'frequencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $plano_id, $aula_id, $id)
    {
        $this->validate($request, [
            'falta' => 'required',
            'aluno' => 'required',
        ]);

        $frequencia = Frequencia::findOrfail($id);
        $frequencia->falta = $request->falta;
        $frequencia->aluno_id = $request->aluno;
        $frequencia->aula_id = $aula_id;
        $frequencia->save();

        return redirect('plano/' . $plano_id . '/aula/' . $aula_id . '/frequencia')->with('success', 'Frequência atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $plano_id
     * @param    int  $aula_id
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($plano_id, $aula_id, $id)
    {
     	Frequencia::destroy($id);

        return redirect('plano/' . $plano_id . '/aula/' . $aula_id . '/frequencia')->with('success', 'Frequência removida com sucesso!');
    }
}
