@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        Lista de Planos de Ensino
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("plano")!!}/create'>
            <button class = 'btn red' type = 'submit'>Criar Novo Plano</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Id Professor</th>
            <th>Curso</th>
            <th>Semestre</th>
            <th>Carga Horária</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($planos as $plano) 
            <tr>
                <td>{!!$plano->user_id!!}</td>
                <td>{!!$plano->curso!!}</td>
                <td>{!!$plano->semestre!!}</td>
                <td>{!!$plano->carga_horaria!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '/plano/{!!$plano->id!!}/delete' class = 'delete btn-floating modal-trigger red'><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/plano/{!!$plano->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/plano/{!!$plano->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $planos->render() !!}

</div>
@endsection