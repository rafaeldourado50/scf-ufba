@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Exibir Frequência</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th class="col-md-2"> Falta </th><td class="col-md-10"> {{ $frequencia->falta }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Nome </th><td class="col-md-10"> {{ $frequencia->aluno->nome }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Matrícula </th><td class="col-md-10"> {{ $frequencia->aluno->matricula }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> E-mail </th><td class="col-md-10"> {{ $frequencia->aluno->email }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Faltas </th><td class="col-md-10"> {{ $frequencia->aluno->faltas }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Data </th><td class="col-md-10"> {{ $frequencia->aula->data }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Tema </th><td class="col-md-10"> {{ $frequencia->aula->tema }} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Descrição </th><td class="col-md-10"> {{ $frequencia->aula->descricao }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pull-left">
                        <a href="{{ url('/plano/' . $plano_id . '/aula/' . $aula->id . '/frequencia/' . $frequencia->id . '/edit') }}" class="btn btn-primary">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                        </a>

                        <form method="POST" action="{{ url('/plano/' . $plano_id . '/aula/' . $aula->id . '/frequencia/' . $frequencia->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                        </form>
                    </div>

                    <div class="pull-right">
                        <a href="{{ url('/plano/' . $plano_id . '/aula/' . $aula->id . '/frequencia') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection