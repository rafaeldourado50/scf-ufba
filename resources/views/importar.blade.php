@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>

    <h1>
        Editar Plano
    </h1>

    <br>
    <form method = 'POST' action = '{!! url("plano")!!}/{!!$plano->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="user_id" name = "user_id" type="text" class="validate" value="{!!$plano->
            user_id!!}"> 
            <label for="user_id">user_id</label>
        </div>
        <div class="input-field col s6">
            <input id="curso" name = "curso" type="text" class="validate" value="{!!$plano->
            curso!!}"> 
            <label for="curso">curso</label>
        </div>
        <div class="input-field col s6">
            <input id="semestre" name = "semestre" type="text" class="validate" value="{!!$plano->
            semestre!!}"> 
            <label for="semestre">semestre</label>
        </div>
        <div class="input-field col s6">
            <input id="carga_horaria" name = "carga_horaria" type="text" class="validate" value="{!!$plano->
            carga_horaria!!}"> 
            <label for="carga_horaria">carga_horaria</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>

<div>
    <form>
    <br>
    <h1>
        Alunos
    </h1>
        
    <table>
            <thead>
                <th>plano_id</th>
                <th>nome</th>
                <th>email</th>
                <th>faltas</th>
                <th>actions</th>
            </thead>
            <tbody>
                @foreach($alunos as $aluno) 
                <tr>
                    <td>{!!$aluno->plano_id!!}</td>
                    <td>{!!$aluno->nome!!}</td>
                    <td>{!!$aluno->email!!}</td>
                    <td>{!!$aluno->faltas!!}</td>
                    <td>
                        <div class = 'row'>
                            <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/aluno/{!!$aluno->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                            <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/aluno/{!!$aluno->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                            <a href = '#' class = 'viewShow btn-floating orange' data-link = '/aluno/{!!$aluno->id!!}'><i class = 'material-icons'>info</i></a>
                        </div>
                    </td>
                </tr>
                @endforeach 
            </tbody>
    </table>
</form>    
</div>
@endsection