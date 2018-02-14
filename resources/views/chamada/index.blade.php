@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        chamada Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("chamada")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New chamada</button>
        </form>
        <ul id="dropdown" class="dropdown-content">
            <li><a href="http://localhost:8000/aluno">Aluno</a></li>
            <li><a href="http://localhost:8000/aula">Aula</a></li>
        </ul>
        <a class="col s3 btn dropdown-button #1e88e5 blue darken-1" href="#!" data-activates="dropdown">Associate<i class="mdi-navigation-arrow-drop-down right"></i></a>
    </div>
    <table>
        <thead>
            <th>falta</th>
            <th>nome</th>
            <th>email</th>
            <th>faltas</th>
            <th>data</th>
            <th>tema</th>
            <th>descricao</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($chamadas as $chamada) 
            <tr>
                <td>{!!$chamada->falta!!}</td>
                <td>{!!$chamada->aluno->nome!!}</td>
                <td>{!!$chamada->aluno->email!!}</td>
                <td>{!!$chamada->aluno->faltas!!}</td>
                <td>{!!$chamada->aula->data!!}</td>
                <td>{!!$chamada->aula->tema!!}</td>
                <td>{!!$chamada->aula->descricao!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/chamada/{!!$chamada->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/chamada/{!!$chamada->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/chamada/{!!$chamada->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $chamadas->render() !!}

</div>
@endsection