@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Aluno</div>

                <div class="panel-body">

                    <form method="POST" action="{{ url('/plano/' . $plano->id . '/aluno/' . $aluno->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="row {{ $errors->has('matricula') ? 'has-error' : ''}}">
                            <label for="matricula" class="col-md-4 control-label">{{ 'Matrícula' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="matricula" type="text" id="matricula" value="{{ $aluno->matricula }}" >
                                {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="row {{ $errors->has('nome') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="nome" type="text" id="nome" value="{{ $aluno->nome }}" >
                                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="row {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="col-md-4 control-label">{{ 'E-mail' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="email" type="text" id="email" value="{{ $aluno->email }}" >
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano->id . '/aluno') }}" class="btn btn-danger">
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