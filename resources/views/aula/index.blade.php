@extends('layouts.app')

@section('content')
<div class = 'container'>
    <h1>
        Aulas
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("aula")!!}/create'>
            <button class = 'btn red' type = 'submit'>Criar Nova Aula</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Id Plano</th>
            <th>Data</th>
            <th>Tema</th>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($aulas as $aula)
            @if($aula->plano_id == $plano_id) 
            <tr>
                <td>{!!$aula->plano_id!!}</td>
                <td>{!!$aula->data!!}</td>
                <td>{!!$aula->tema!!}</td>
                <td>{!!$aula->descricao!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = "/aula/{!!$aula->id!!}/delete" class = 'delete btn-floating modal-trigger red'><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/aula/{!!$aula->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/aula/{!!$aula->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach 
        </tbody>
    </table>
    {!! $aulas->render() !!}

</div>
@endsection