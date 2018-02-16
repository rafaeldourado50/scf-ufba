@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Chamadas</div>

                <div class="panel-body">

                    @include('admin.info')

                    <div class="form-group">
                        <div class="pull-left">
                            <a href="{{ url('/chamada/create') }}" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
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
                                <th>E-mail</th>
                                <th>Faltas</th>
                                <th>Data</th>
                                <th>Tema</th>
                                <th>Descricao</th>
                                <th style="width: 150px !important;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chamadas as $chamada)
                                <tr>
                                    <td>{!!$chamada->falta!!}</td>
                                    <td>{!!$chamada->aluno->nome!!}</td>
                                    <td>{!!$chamada->aluno->email!!}</td>
                                    <td>{!!$chamada->aluno->faltas!!}</td>
                                    <td>{!!$chamada->aula->data!!}</td>
                                    <td>{!!$chamada->aula->tema!!}</td>
                                    <td>{!!$chamada->aula->descricao!!}</td>
                                    <td>
                                        <a href="{{ url('/chamada/' . $chamada->id) }}" title="Visualizar">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </a>

                                        <a href="{{ url('/chamada/' . $chamada->id . '/edit') }}" title="Editar">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>

                                        <form method="POST" action="{{ url('/chamada/' . $chamada->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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