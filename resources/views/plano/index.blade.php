@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Planos</div>

                <div class="panel-body">

                    @include('admin.info')

                    <div class="form-group">
                        <div class="pull-left">
                            <a href="{{ url('/plano/create') }}" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
                            </a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/import') }}" class="btn btn-success">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Importar
                            </a>
                        </div>
                    </div>

                    <br/><br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Turma</th>
                                <th>Semestre</th>
                                <th>Carga Horária</th>
                                <th style="width: 210px !important;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($planos as $plano)
                                <tr>
                                    <td>{!! $plano->codigo_disciplina . ' - ' . $plano->nome !!}</td>
                                    <td>{!! $plano->codigo_turma !!}</td>
                                    <td>{!! $plano->semestre !!}</td>
                                    <td>{!! $plano->carga_horaria !!}</td>
                                    <td>
                                        <a href="{{ url('/plano/' . $plano->id) }}" title="Visualizar">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </a>

                                        <a href="{{ url('/plano/' . $plano->id . '/edit') }}" title="Editar">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>

                                        <form method="POST" action="{{ url('/plano/' . $plano->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>

                                        <a href="{{ url('/plano/' . $plano->id . '/aluno') }}" title="Listar Alunos">
                                            <button class="btn btn-success btn-sm"><i class="fa fa-graduation-cap" aria-hidden="true"></i></button>
                                        </a>

                                        <a href="{{ url('/plano/' . $plano->id . '/aula') }}" title="Listar Aulas">
                                            <button class="btn btn-success btn-sm"><i class="fa fa-book" aria-hidden="true"></i></button>
                                        </a>
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