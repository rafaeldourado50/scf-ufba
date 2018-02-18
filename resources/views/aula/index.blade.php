@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Aulas</div>

                <div class="panel-body">

                    @include('admin.info')

                    <div class="form-group">
                        <div class="pull-left">
                            <a href="{{ url('/plano/' . $plano->id . '/aula/create') }}" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
                            </a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/plano') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                            </a>
                        </div>
                    </div>

                    <br/><br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Tema</th>
                                <th>Descrição</th>
                                <th style="width: 200px !important;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plano->aulas as $aula)
                                <tr>
                                    <td>{{ $aula->data }}</td>
                                    <td>{{ $aula->tema }}</td>
                                    <td>{{ $aula->descricao }}</td>
                                    <td>
                                        <form method="GET" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id) }}" style="display:inline">
                                            <button class="btn btn-info btn-sm" title="Visualizar">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                        <form method="GET" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id . '/edit') }}" style="display:inline">
                                            <button class="btn btn-primary btn-sm" title="Editar">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id) }}" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                        <form method="GET" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id . '/frequencia') }}" style="display:inline">
                                            <button class="btn btn-success btn-sm" title="Listar Frequências">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                        <form method="GET" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id . '/chamada') }}" style="display:inline">
                                            <button class="btn btn-success btn-sm" title="Realizar Chamada">
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection