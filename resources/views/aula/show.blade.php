@extends('layouts.app')

@section('content')
<div class = 'container'>
    <h1>
        Aula
    </h1>
    <form method = 'get' action = '{!!url("aula")!!}'>
        <button class = 'btn blue'>Listar Aulas</button>
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
                <td>{!!$aula->plano_id!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Data : </i></b>
                </td>
                <td>{!!$aula->data!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Tema : </i></b>
                </td>
                <td>{!!$aula->tema!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Descrição : </i></b>
                </td>
                <td>{!!$aula->descricao!!}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <form method = 'get' action = '/aluno/{!!$aula->plano_id!!}/chamada'>
        <button class = 'btn green'>Fazer Chamada</button>                    
    </form>    
</div>
@endsection