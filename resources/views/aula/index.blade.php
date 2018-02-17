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
                                <th style="width: 175px !important;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plano->aulas as $aula)
                                <tr>
                                    <td>{{ $aula->data }}</td>
                                    <td>{{ $aula->tema }}</td>
                                    <td>{{ $aula->descricao }}</td>
                                    <td>
                                        <a href="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id) }}" title="Visualizar">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </a>

                                        <a href="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id . '/edit') }}" title="Editar">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>

                                        <form method="POST" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                        </form>

                                        <a href="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id . '/frequencia') }}" title="Listar Frequências">
                                            <button class="btn btn-success btn-sm"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                                        </a>

                                        <br />
                                        <br />
                                        <form method="get" action = '/plano/{!! $plano->id !!}/aluno/{!! $aula->id !!}/chamada'>
                                            <button class="btn btn-success btn-sm"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Fazer Chamada</button>
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