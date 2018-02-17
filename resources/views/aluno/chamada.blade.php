@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Realizar Chamada</div>

                <div class="panel-body">

                    @include('admin.info')

                    <div class="form-group">
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
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Faltas</th>
                                <th>Registrar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alunos as $aluno)
                                @if($aluno->plano_id == $plano_id)
                                    <tr>
                                        <td>{!!$aluno->nome!!}</td>
                                        <td>{!!$aluno->email!!}</td>
                                        <td>{!!$aluno->faltas!!}</td>
                                        <td>
                                            <div class = 'row'>
                                                <a href = "/plano/{!!$plano_id!!}/aluno/{!!$aluno->id!!}/registrar" class = 'btn btn-danger btn-sm'> +</a>
                                                <a href = "/plano/{!!$plano_id!!}/aluno/{!!$aluno->id!!}/desregistrar" class = 'btn btn-success btn-sm'> - </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection