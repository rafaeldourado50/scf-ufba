@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nova Chamada</div>

                <div class="panel-body">

                    <form method="POST" action="{{ url('/chamada') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="row">
                            <label for="falta" class="col-md-4 control-label">{{ 'Falta' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="falta" type="text" id="falta" >
                                {!! $errors->first('falta', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <label for="aluno_id" class="col-md-4 control-label">{{ 'Aluno' }}</label>
                            <div class="col-md-12">
                                <select name="aluno_id">
                                    <option value="" >--- Selecione ---</option>
                                    @foreach($alunos as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label for="aula_id" class="col-md-4 control-label">{{ 'Aula' }}</label>
                            <div class="col-md-12">
                                <select name="aula_id">
                                    <option value="" >--- Selecione ---</option>
                                    @foreach($aulas as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/chamada') }}" class="btn btn-danger">
                                    <i class="fa fa-ban" aria-hidden="true"></i> Cancelar
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection