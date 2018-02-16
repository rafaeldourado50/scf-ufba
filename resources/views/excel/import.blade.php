@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Importar Plano de Aulas</div>

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
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-file-excel-o" aria-hidden="true"> Importar</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
