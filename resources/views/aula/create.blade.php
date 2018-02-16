@extends('layouts.app')

@section('content')
<div class = 'container'>
    <h1>
        Criar Aula
    </h1>
    <form method = 'get' action = '{!!url("aula")!!}'>
        <button class = 'btn blue'>Listar Aulas</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("aula")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="plano_id" name = "plano_id" type="text" class="validate">
            <label for="plano_id">Id Plano</label>
        </div>
        <div class="input-field col s6">
            <input id="data" name = "data" type="date" class="validate">
        </div>
        <div class="input-field col s6">
            <input id="tema" name = "tema" type="text" class="validate">
            <label for="tema">Tema</label>
        </div>
        <div class="input-field col s6">
            <input id="descricao" name = "descricao" type="text" class="validate">
            <label for="descricao">Descrição</label>
        </div>
        <button class = 'btn red' type ='submit'>Criar</button>
    </form>
</div>
@endsection