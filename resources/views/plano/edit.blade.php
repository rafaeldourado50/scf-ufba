@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Editar Plano de Ensino
    </h1>
    <form method = 'get' action = '{!!url("plano")!!}'>
        <button class = 'btn blue'>Listar Planos de Ensino</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("plano")!!}/{!!$plano->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="user_id" name = "user_id" type="text" class="validate" value="{!!$plano->
            user_id!!}"> 
            <label for="user_id">Id Usuário</label>
        </div>
        <div class="input-field col s6">
            <input id="curso" name = "curso" type="text" class="validate" value="{!!$plano->
            curso!!}"> 
            <label for="curso">Curso</label>
        </div>
        <div class="input-field col s6">
            <input id="semestre" name = "semestre" type="text" class="validate" value="{!!$plano->
            semestre!!}"> 
            <label for="semestre">Semestre</label>
        </div>
        <div class="input-field col s6">
            <input id="carga_horaria" name = "carga_horaria" type="text" class="validate" value="{!!$plano->
            carga_horaria!!}"> 
            <label for="carga_horaria">Carga Horária</label>
        </div>
        <button class = 'btn red' type ='submit'>Atualizar</button>
    </form>
</div>
@endsection