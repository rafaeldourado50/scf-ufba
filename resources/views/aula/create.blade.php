@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nova Aula</div>

                <div class="panel-body">

                    <form method="POST" action="{{ url('/plano/' . $plano->id . '/aula') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Data' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="data" type="datetime-local" id="data" value="{{ '' }}" >
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="row {{ $errors->has('tema') ? 'has-error' : ''}}">
                            <label for="tema" class="col-md-4 control-label">{{ 'Tema' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="tema" type="text" id="tema" value="{{ '' }}" >
                                {!! $errors->first('tema', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="row {{ $errors->has('descricao') ? 'has-error' : ''}}">
                            <label for="email" class="col-md-4 control-label">{{ 'Descrição' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="descricao" type="text" id="descricao" value="{{ '' }}" >
                                {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano->id . '/aula') }}" class="btn btn-danger">
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