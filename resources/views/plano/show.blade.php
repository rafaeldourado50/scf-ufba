@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Exibir Plano</div>

                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th class="col-md-2"> Disciplina </th><td class="col-md-10"> {{ $plano->codigo_disciplina . ' - ' . $plano->nome }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Turma </th><td class="col-md-10"> {{ $plano->codigo_turma }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Semestre </th><td class="col-md-10"> {{ $plano->semestre }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Carga Horária </th><td class="col-md-10"> {{ $plano->carga_horaria }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pull-left">
                        <a href="{{ url('/plano/' . $plano->id . '/edit') }}" class="btn btn-primary">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                        </a>

                        <form method="POST" action="{{ url('/plano/' . $plano->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                        </form>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('/plano') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection