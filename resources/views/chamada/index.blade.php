@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Realizar Chamada</div>

                <div class="panel-body">

                    @include('admin.info')

                    <div class="form-group">
                        <div class="pull-left">
                            <b>Disciplina: </b> {{ $plano->codigo_disciplina . ' - ' . $plano->nome . '. '}} <b> Turma: </b> {{ $plano->codigo_turma }}
                            <br /><b>Aula: </b> {{ $aula->data }}
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/plano/' . $plano->id . '/aula') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                            </a>
                        </div>
                    </div>

                    <br/><br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Matrícula</th>
                                <th>Faltas</th>
                                <th style="width: 90px !important;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alunos as $aluno)
                                <tr>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ $aluno->matricula }}</td>
                                    <td>{{ $aluno->faltas }}</td>
                                    <td>
                                        <form method="POST" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id . '/aluno/' . $aluno->id . '/check') }}" style="display:inline">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-success btn-sm" title="Presente">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id . '/aluno/' . $aluno->id . '/uncheck') }}" style="display:inline">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Ausente">
                                                <i class="fa fa-times" aria-hidden="true"></i>
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