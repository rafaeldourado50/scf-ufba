@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Novo Plano</div>

                <div class="panel-body">

                    <form method="POST" action="{{ url('/plano') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="row {{ $errors->has('semestre') ? 'has-error' : ''}}">
                            <label for="semestre" class="col-md-4 control-label">{{ 'Semestre' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="semestre" type="text" id="semestre" value="{{ '' }}" >
                                {!! $errors->first('semestre', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="row {{ $errors->has('disciplina') ? 'has-error' : ''}}">
                            <label for="disciplina" class="col-md-4 control-label">{{ 'Disciplina' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="disciplina" type="text" id="disciplina" value="{{ '' }}" >
                                {!! $errors->first('disciplina', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="row {{ $errors->has('turma') ? 'has-error' : ''}}">
                            <label for="turma" class="col-md-4 control-label">{{ 'Turma' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="turma" type="text" id="turma" value="{{ '' }}" >
                                {!! $errors->first('turma', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano') }}" class="btn btn-danger">
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