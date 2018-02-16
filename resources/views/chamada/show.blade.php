@extends('layouts.app')

@section('content')
<div class = 'container'>
    <h1>
        Show chamada
    </h1>
    <form method = 'get' action = '{!!url("chamada")!!}'>
        <button class = 'btn blue'>chamada Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>falta : </i></b>
                </td>
                <td>{!!$chamada->falta!!}</td>
            </tr>
            <tr>
                <td>
                    <b>
                        <i>nome : </i>
                        <b>
                        </td>
                        <td>{!!$chamada->aluno->nome!!}</td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                <i>email : </i>
                                <b>
                                </td>
                                <td>{!!$chamada->aluno->email!!}</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        <i>faltas : </i>
                                        <b>
                                        </td>
                                        <td>{!!$chamada->aluno->faltas!!}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>
                                                <i>data : </i>
                                                <b>
                                                </td>
                                                <td>{!!$chamada->aula->data!!}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        <i>tema : </i>
                                                        <b>
                                                        </td>
                                                        <td>{!!$chamada->aula->tema!!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                <i>descricao : </i>
                                                                <b>
                                                                </td>
                                                                <td>{!!$chamada->aula->descricao!!}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endsection