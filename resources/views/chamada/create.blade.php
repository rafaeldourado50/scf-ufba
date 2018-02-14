@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Create chamada
    </h1>
    <form method = 'get' action = '{!!url("chamada")!!}'>
        <button class = 'btn blue'>chamada Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("chamada")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="falta" name = "falta" type="text" class="validate">
            <label for="falta">falta</label>
        </div>
        <div class="input-field col s12">
            <select name = 'aluno_id'>
                @foreach($alunos as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
            <label>alunos Select</label>
        </div>
        <div class="input-field col s12">
            <select name = 'aula_id'>
                @foreach($aulas as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
            <label>aulas Select</label>
        </div>
        <button class = 'btn red' type ='submit'>Create</button>
    </form>
</div>
@endsection