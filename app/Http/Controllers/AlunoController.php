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
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'matricula' => 'required',
            'nome' => 'required',
            'email' => 'required',
        ]);

        $requestData = $request->all();

        Aluno::create($requestData);

        return redirect('aluno')->with('success', 'Aluno cadastrado com sucesso!');
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
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'matricula' => 'required',
            'nome' => 'required',
            'email' => 'required',
        ]);

        $requestData = $request->all();

        $aluno = Aluno::findOrFail($id);
        $aluno->update($requestData);

        return redirect('aluno')->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aluno::destroy($id);

        return redirect('aluno')->with('success', 'Aluno removido com sucesso!');
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
}
