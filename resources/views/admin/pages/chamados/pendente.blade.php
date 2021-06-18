@extends('adminlte::page')

@section('title', 'Chamados')

@section('content_header')
    <h1>Chamados</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            Chamados Não Aprovados
        </div>
        <div class="card-body">
            <table class="table condensed">
                <thead style="text-align: center ">
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Prioridade</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th >Ações</th>
                </thead>
                <tbody>
                    @foreach ($chamados as $chamado)
                        <tr style="text-align: center ">
                            <td> {{ $chamado->id }}
                            <td> {{ $chamado->titulo }}
                            <td>{{ $chamado->prioridade }}</td>
                            <td>{{ $chamado->descricao }}</td>
                            <td> <img  width="150" height="50" src="/img/events/{{ $chamado->imagem}}">

                            <td  >
                                <Form style="display: inline-block" action="{{ route('chamado.delete', $chamado->id) }}" class="form" method="POST">
                                    @csrf
                                    @method('PUT')
                                <button type="submit" class="btn btn-success">Aprovar</button>
                            </Form>

                                <Form style="display: inline-block" action="{{ route('chamado.delete', $chamado->id) }}" class="form" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                        </Form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop
