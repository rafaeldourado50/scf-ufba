@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        Alunos
    </h1>
    
    <table>
        <thead>
            <th>Id Plano</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Faltas</th>
            <th>Registrar</th>
        </thead>
        <tbody>
            @foreach($alunos as $aluno) 
            @if($aluno->plano_id == $plano_id)
            <tr>
                <td>{!!$aluno->plano_id!!}</td>
                <td>{!!$aluno->nome!!}</td>
                <td>{!!$aluno->email!!}</td>
                <td>{!!$aluno->faltas!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = "/aluno/{!!$aluno->id!!}/registrar" class = 'delete btn-floating modal-trigger red'><i class = 'material-icons'>action</i>+</a>
                        <a href = "/aluno/{!!$aluno->id!!}/desregistrar" class = 'delete btn-floating modal-trigger green'><i class = 'material-icons'>action</i>-</a>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach 
        </tbody>
    </table>
    {!! $alunos->render() !!}

</div>
@endsection