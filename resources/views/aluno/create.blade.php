@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Criar Aluno
    </h1>
    <form method = 'get' action = '{!!url("aluno")!!}'>
        <button class = 'btn blue'>Listar Alunos</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("aluno")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="plano_id" name = "plano_id" type="text" class="validate" value="">
            <label for="plano_id">Id Plano</label>
        </div>
        <div class="input-field col s6">
            <input id="nome" name = "nome" type="text" class="validate">
            <label for="nome">Nome</label>
        </div>
        <div class="input-field col s6">
            <input id="email" name = "email" type="text" class="validate">
            <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
            <input id="faltas" name = "faltas" type="text" class="validate" value="0">
            <label for="faltas">Faltas</label>
        </div>
        <button class = 'btn red' type ='submit'>Criar</button>
    </form>
</div>
@endsection