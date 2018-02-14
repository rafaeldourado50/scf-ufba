@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Edit aula
    </h1>
    <form method = 'get' action = '{!!url("aula")!!}'>
        <button class = 'btn blue'>aula Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("aula")!!}/{!!$aula->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="plano_id" name = "plano_id" type="text" class="validate" value="{!!$aula->
            plano_id!!}"> 
            <label for="plano_id">plano_id</label>
        </div>
        <div class="input-field col s6">
            <input id="data" name = "data" type="text" class="validate" value="{!!$aula->
            data!!}"> 
            <label for="data">data</label>
        </div>
        <div class="input-field col s6">
            <input id="tema" name = "tema" type="text" class="validate" value="{!!$aula->
            tema!!}"> 
            <label for="tema">tema</label>
        </div>
        <div class="input-field col s6">
            <input id="descricao" name = "descricao" type="text" class="validate" value="{!!$aula->
            descricao!!}"> 
            <label for="descricao">descricao</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@endsection