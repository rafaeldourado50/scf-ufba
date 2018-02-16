<?php

namespace App\Http\Controllers;

use Auth;

use App\Disciplina;
use App\Plano;
use App\Turma;

use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if (!empty($user)) {
            $planos = DB::table('planos')
                ->join('turmas', 'turmas.id', '=', 'planos.turma_id')
                ->join('disciplinas', 'disciplinas.id', '=', 'turmas.disciplina_id')
                ->where('planos.user_id', '=', $user->id)
                ->select('planos.id', 'disciplinas.codigo as codigo_disciplina', 'disciplinas.nome', 'turmas.codigo as codigo_turma'
                    , 'planos.semestre', 'disciplinas.carga_horaria')
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
        $this->validate($request, [
            'semestre' => 'required',
            'disciplina' => 'required',
            'turma' => 'required',
        ]);

        $codigo_disciplina = $request->disciplina;
        $codigo_turma = $request->turma;

        $disciplina = Disciplina::where('codigo', '=', $codigo_disciplina)->first();

        $turma = Turma::where([
            ['codigo', '=', $codigo_turma],
            ['disciplina_id', '=', $disciplina->id],
        ])->first();

        $plano = new Plano();
        $plano->user_id = Auth::user()->id;
        $plano->semestre = $request->semestre;
        $plano->turma_id = $turma->id;
        $plano->save();

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
        $plano = DB::table('planos')
            ->join('turmas', 'turmas.id', '=', 'planos.turma_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'turmas.disciplina_id')
            ->where('planos.id', '=', $id)
            ->select('planos.id', 'disciplinas.codigo as codigo_disciplina', 'disciplinas.nome', 'turmas.codigo as codigo_turma'
                , 'planos.semestre', 'disciplinas.carga_horaria')
            ->first();

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
        $plano = DB::table('planos')
            ->join('turmas', 'turmas.id', '=', 'planos.turma_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'turmas.disciplina_id')
            ->where('planos.id', '=', $id)
            ->select('planos.id', 'disciplinas.codigo as codigo_disciplina', 'disciplinas.nome', 'turmas.codigo as codigo_turma'
                , 'planos.semestre', 'disciplinas.carga_horaria')
            ->first();

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
        $this->validate($request, [
            'semestre' => 'required',
        ]);

        $plano = Plano::findOrFail($id);
        $plano->semestre = $request->semestre;
        $plano->save();

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
