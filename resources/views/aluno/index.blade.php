@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        Alunos
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("aluno")!!}/create'>
            <button class = 'btn red' type = 'submit'>Criar Novo Aluno</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Id Plano</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Faltas</th>
            <th>Ações</th>
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
                        <a href = "/aluno/{!!$aluno->id!!}/delete" class = 'delete btn-floating modal-trigger red'><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/aluno/{!!$aluno->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/aluno/{!!$aluno->id!!}'><i class = 'material-icons'>info</i></a>
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