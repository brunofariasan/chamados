@extends('adminlte::page')

@section('title', 'Criar Chamados')

@section('content_header')
    <h1>Chamados</h1>
@stop

@section('content')


<div id="alert alert-success" class="col-md-6 offset-md-3">

    @if(isset($errors) and count($errors) > 0)
     <div id="msg" class="alert alert-error">
                <p>{{$error}}</p>
     </div>
    @elseif(isset($success) and count($success) > 0)
        <div id="msg" class="alert alert-sucess">
                    <p>{{$sucess}}</p>
        </div>
    @endif



    <div class="container-fluir">
        <div class="row">
            @yield('content')
        </div>
        @if (session('success'))
            <p class="success">{{ session('success')}}</p>
        @endif
        @yield('content')



    <h1>Criar um chamado </h1>

     <form action="{{ route('chamado.store') }}" method="POST" enctype="multipart/form-data">
         @csrf

             <div class="form-group">
                 <label for="titulo"> Titulo:</label>
                 <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do registro" />
             </div>

             <div class="form-group">
                 <label for="titulo"> Categoria:</label>
                 <select name="categoria" id="categoria" class="form-control">
                     <option > Selecione uma categoria ... </option>
                     <option value="Login"> Login </option>
                     <option value="Cadastro"> Cadastro </option>
                     <option value="Comentario"> Comentario </option>

                 </select>

             </div>


             <div class="form-group">
                 <label for="titulo"> Prioridade:</label>
                 <select name="prioridade" id="prioridade" class="form-control">
                     <option> Selecione uma opção ... </option>
                     <option value="Alta"> Alta </option>
                     <option value="Baixa"> Baixa </option>
                 </select>
             </div>

             <div class="form-group">
                 <label for="titulo"> Descrição:</label>
                 <textarea name="descricao"id="descricao" class="form-control" placeholder="Descrição"></textarea>
             </div>

             <div class="form-group">
                 <label for="image"> Insira uma imagem da tarefa
                 <input type="file" id="image" name="imagem" class="from-control-file">
                </label>
                <input type="submit" class="btn btn-primary" value="Registrar">
             </div>



            </form>


 </div>

 <footer>

 </footer>

@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop
