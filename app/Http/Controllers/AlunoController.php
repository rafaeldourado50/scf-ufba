<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Plano;

use Illuminate\Http\Request;

class AlunoController extends Controller
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
     * @return  \Illuminate\Http\Response
     */
    public function index($plano_id)
    {
        $plano = Plano::findOrFail($plano_id);

        return view('aluno.index', compact('plano'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param    int  $plano_id
     * @return  \Illuminate\Http\Response
     */
    public function create($plano_id)
    {
        $plano = Plano::findOrFail($plano_id);

        return view('aluno.create', compact('plano'));
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
            'matricula' => 'required',
            'nome' => 'required',
            'email' => 'required',
        ]);

        $aluno = new Aluno();
        $aluno->plano_id = $plano_id;
        $aluno->matricula = $request->matricula;
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->faltas = 0;
        $aluno->save();

        return redirect('plano/' . $plano_id . '/aluno')->with('success', 'Aluno cadastrado com sucesso!');
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
        $aluno = Aluno::findOrfail($id);
        $plano = Plano::findOrfail($plano_id);

        return view('aluno.show', compact('aluno', 'plano'));
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
        $aluno = Aluno::findOrfail($id);
        $plano = Plano::findOrfail($plano_id);

        return view('aluno.edit', compact('aluno', 'plano'));
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
            'matricula' => 'required',
            'nome' => 'required',
            'email' => 'required',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->plano_id = $plano_id;
        $aluno->matricula = $request->matricula;
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->save();

        return redirect('plano/' . $plano_id . '/aluno')->with('success', 'Aluno atualizado com sucesso!');
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
        Aluno::destroy($id);

        return redirect('plano/' . $plano_id . '/aluno')->with('success', 'Aluno removido com sucesso!');
    }

    public function consulta($id)
    {
        $plano_id = $id;
        $title = 'Lista de Alunos';
        $alunos = Aluno::paginate(6);
        return view('aluno.index',compact('alunos','title','plano_id'));
    }

    public function registrar($plano_id, $id)
    {
        $aluno = Aluno::findOrfail($id);
        $plano = Plano::findOrfail($aluno->plano_id);

        $aluno->faltas = $aluno->faltas + 1;
        $aluno->save();

        $plano_id = $plano->id;
        $alunos = Aluno::all();

        return view('aluno.chamada',compact('alunos','plano_id'));
    }

    public function desregistrar($plano_id, $id)
    {
        $aluno = Aluno::findOrfail($id);
        if($aluno->faltas > 0){
            $aluno->faltas = $aluno->faltas - 1;
            $aluno->save();
        }
        $plano_id = $aluno->plano_id;
        $alunos = Aluno::all();

        return view('aluno.chamada',compact('alunos','plano_id'));
    }

    public function chamada($id)
    {
        $plano_id = $id;
        $alunos = Aluno::all();

        return view('aluno.chamada',compact('alunos', 'plano_id'));
    }
}
