@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Criar Plano de Ensino
    </h1>
    <form method = 'get' action = '{!!url("plano")!!}'>
        <button class = 'btn blue'>Listar Planos</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("plano")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="user_id" name = "user_id" type="text" value="{{ Auth::user()->id }}" class="validate">
            <label for="user_id">Id Professor</label>
        </div>
        <div class="input-field col s6">
            <input id="curso" name = "curso" type="text" class="validate">
            <label for="curso">Curso</label>
        </div>
        <div class="input-field col s6">
            <input id="semestre" name = "semestre" type="text" class="validate">
            <label for="semestre">Semestre</label>
        </div>
        <div class="input-field col s6">
            <input id="carga_horaria" name = "carga_horaria" type="text" class="validate">
            <label for="carga_horaria">Carga Horária</label>
        </div>
        <button class = 'btn red' type ='submit'>Criar</button>
    </form>
    
</div>
@endsection