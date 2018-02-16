<?php

namespace App\Http\Controllers;

use Auth;

use App\Plano;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PlanoController.
 */
class PlanoController extends Controller
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
    public function index()
    {
        $user = Auth::user();
        if (!empty($user))
        {
            $planos = DB::table('planos')
                ->join('turmas', 'turmas.id', '=', 'planos.turma_id')
                ->join('disciplinas', 'disciplinas.id', '=', 'turmas.disciplina_id')
                ->where('user_id', '=', $user->id)
                ->select('planos.id', 'disciplinas.nome', 'turmas.codigo', 'planos.semestre', 'disciplinas.carga_horaria')
                ->get();
        }
        return view('plano.index', compact('planos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
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
        $requestData = $request->all();

        Plano::create($requestData);

        return redirect('plano')->with('success', 'Plano cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plano = Plano::findOrFail($id);

        return view('plano.show', compact('plano'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plano = Plano::findOrFail($id);

        return view('plano.edit', compact('plano'));
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
        $requestData = $request->all();

        $plano = Plano::findOrFail($id);
        $plano->update($requestData);

        return redirect('plano')->with('success', 'Plano atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plano::destroy($id);

        return redirect('plano')->with('success', 'Plano removido com sucesso!');
    }
}
