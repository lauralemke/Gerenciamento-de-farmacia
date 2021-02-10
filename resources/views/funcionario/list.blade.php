@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem de funcionários') }}<a href="/home"><button class="btn btn-outline-primary" style="float: right;">Voltar</button></a></div>

                <div class="card-body">

    <a  class="btn btn-primary btn-lg btn-block" href="{{url('/funcionario/create')}}">Cadastrar Novos funcionários</a>
    <br>
    <form action="{{ action('FuncionarioController@search')}}" method="POST">
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
            </div>
</div>
<br> 
    </form>
   
    <table class = "table table-hover">
       <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Ação</th>
                <th scope="col">Ação</th>
            </tr>
       </thead>
            <tbody>
            @foreach($funcionario as $dados)
            <tr>
                <td>{{$dados->id}}</td>
                <td>{{$dados->nome}}</td>
                <td>{{$dados->cpf}}</td>
                <td>{{$dados->data_nascimento}}</td>
                <td> <a href="{{action('FuncionarioController@edit',$dados->id)}}">Editar</a></td>
                <td> <a href="{{action('FuncionarioController@remove',$dados->id)}}" onclick="return confirm('tem certeza q deseja remover?');">Remover</a></td>
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