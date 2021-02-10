@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem de clientes') }} 
<a href="/home"><button class="btn btn-outline-primary" style="float: right;">Voltar</button></a></div>

                <div class="card-body">

    <a  class="btn btn-primary btn-lg btn-block" href="{{url('/cliente/create')}}">Cadastrar Novos clientes</a>
    <br>
    <form action="{{ action('ClienteController@search')}}" method="POST">
        @csrf
        <div class= "form-row">
            <div class="col-5">
        <input type="text" placeholder="Pesquisar Nome" class="form-control" name="nome" />
</div>
<div class="col-5">
        <input type="text" placeholder="Pesquisar CPF" class="form-control" name="cpf" />
</div>
<div class="col-5">
        <input type="text" placeholder="Pesquisar Data de nascimento" class="form-control" name="data_nascimento" />
</div>
<div class="col">
        <button type="submit"  class="btn btn-primary">Buscar</button>
        </form>
         
    <a href="{{action('PDFController@geraPDF')}}" class="btn btn-primary">Gerar PDF</a>
            </div>
</div>

<br> 
    <table class = "table table-hover">
       <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Municipio</th>
                <th scope="col">Ação</th>
                <th scope="col">Ação</th>
            </tr>
       </thead>
            <tbody>
            @foreach($cliente as $dados)
            <tr>
                <td>{{$dados->id}}</td>
                <td>{{$dados->nome}}</td>
                <td>{{$dados->cpf}}</td>
                <td>{{$dados->data_nascimento}}</td>
                <td>{{$dados->municipio->nome}}</td>
                <td> <a href="{{action('ClienteController@edit',$dados->id)}}">Editar</a></td>
                <td> <a href="{{action('ClienteController@remove',$dados->id)}}" onclick="return confirm('tem certeza q deseja remover?');">Remover</a></td>
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