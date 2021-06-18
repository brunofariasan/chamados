@extends('adminlte::page')

@section('title', 'Chamados')

@section('content_header')
    <h1>Chamados</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            Chamados Aprovados
        </div>
        <div class="card-body">
            <table class="table condensed">
                <thead >
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Prioridade</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($chamados as $chamado)
                        <tr>
                            <td>{{ $chamado->id }}
                                <td>  {{ $chamado->titulo }}
                            <td>{{ $chamado->prioridade }}</td>
                            <td>{{ $chamado->descricao }}</td>
                            <td style="width=10px">
                                <Form action="{{ route('chamado.delete', $chamado->id) }}" class="form" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-success">Concluir</button>
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
