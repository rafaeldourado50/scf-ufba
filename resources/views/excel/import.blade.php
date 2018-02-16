@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Importar Plano</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action='{!!url("import")!!}' enctype="multipart/form-data">
                        <br>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="file" name='file'>
                        <br>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"> Importar</i>
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
