@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Frequências: {{ $aula->data }}</div>

                <div class="panel-body">

                    @include('admin.info')

                    <div class="form-group">
                        <div class="pull-left">
                            <a href="{{ url('/plano/' . $plano_id . '/aula/' . $aula->id . '/frequencia/create') }}" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
                            </a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/plano/' . $plano_id . '/aula') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                            </a>
                        </div>
                    </div>

                    <br/><br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>Falta</th>
                                <th>Nome</th>
                                <th>Matrícula</th>
                                <th>Faltas</th>
                                <th>Data</th>
                                <th>Tema</th>
                                <th style="width: 150px !important;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($aula->frequencias as $frequencia)
                                <tr>
                                    <td>{{ $frequencia->falta }}</td>
                                    <td>{{ $frequencia->aluno->nome }}</td>
                                    <td>{{ $frequencia->aluno->matricula }}</td>
                                    <td>{{ $frequencia->aluno->faltas }}</td>
                                    <td>{{ $frequencia->aula->data }}</td>
                                    <td>{{ $frequencia->aula->tema }}</td>
                                    <td>
                                        <a href="{{ url('/plano/' . $plano_id . '/aula/' . $aula->id . '/frequencia/' . $frequencia->id) }}" title="Visualizar">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </a>

                                        <a href="{{ url('/plano/' . $plano_id . '/aula/' . $aula->id . '/frequencia/' . $frequencia->id . '/edit') }}" title="Editar">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>

                                        <form method="POST" action="{{ url('/plano/' . $plano_id . '/aula/' . $aula->id . '/frequencia/' . $frequencia->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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