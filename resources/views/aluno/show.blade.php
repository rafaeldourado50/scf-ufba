@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Aluno
    </h1>
    <form method = 'get' action = '{!!url("aluno")!!}'>
        <button class = 'btn blue'>Listar Alunos</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Campo</th>
            <th>Valor</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>Id Plano : </i></b>
                </td>
                <td>{!!$aluno->plano_id!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Nome : </i></b>
                </td>
                <td>{!!$aluno->nome!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Email : </i></b>
                </td>
                <td>{!!$aluno->email!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Faltas : </i></b>
                </td>
                <td>{!!$aluno->faltas!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection