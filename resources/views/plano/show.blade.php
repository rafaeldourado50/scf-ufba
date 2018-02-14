@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Plano de Ensino
    </h1>

    <table class = 'highlight bordered'>
        <thead>
            <th>Campo</th>
            <th>Valor</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>Id Usuário : </i></b>
                </td>
                <td>{!!$plano->user_id!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Curso : </i></b>
                </td>
                <td>{!!$plano->curso!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Semestre : </i></b>
                </td>
                <td>{!!$plano->semestre!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>Carga Horária : </i></b>
                </td>
                <td>{!!$plano->carga_horaria!!}</td>
            </tr>
        </tbody>
    </table>

    <br>

    <div class="row">
        <form method = 'get' action = '/aluno/{!!$plano->id!!}/consulta'>
            <button class = 'btn green'>Listar Alunos</button>            
        </form>
        <br>
        <form method = 'get' action = '/aula/{!!$plano->id!!}/consulta'>
            <button class = 'btn orange'>Listar Aulas</button>
        </form> 
        <br>
        <form method = 'get' action = '{!!url("plano")!!}'>
            <button class = 'btn blue'>Listar Planos</button>
            <a href = '#' class = 'viewEdit btn-floating red' data-link = '/plano/{!!$plano->id!!}/edit'><i class = 'material-icons'>edit</i></a>
        </form>  
    </div>
</div>
@endsection