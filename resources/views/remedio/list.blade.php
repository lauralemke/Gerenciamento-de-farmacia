@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Listagem de remedios') }}<a href="/home"><button class="btn btn-outline-primary" style="float: right;">Voltar</button></a></div>

                <div class="card-body">

    <a  class="btn btn-primary btn-lg btn-block" href="{{url('/remedio/create')}}">Cadastrar Novos Medicamentos</a>
    <br>
    <form action="{{ action('RemedioController@search')}}" method="POST">
        @csrf
        <div class= "form-row">
            <div class="col-5">
        <input type="text" placeholder="Pesquisar Nome" class="form-control" name="nome" />
</div>
<div class="col-5">
        <input type="text" placeholder="Pesquisar Indicação" class="form-control" name="indicacao" />
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
                <th scope="col">Faixa preta</th>
                <th scope="col">Generico</th>
                <th scope="col">Forma</th>
                <th scope="col">Indicação</th>
                <th scope="col">Preço</th>
                <th scope="col">Ação</th>
                <th scope="col">Ação</th>
            </tr>
       </thead>
            <tbody>
            @foreach($remedio as $dados)
            <tr>
                <td>{{$dados->id}}</td>
                <td>{{$dados->nome}}</td>
                <td>{{$dados->faixa_preta}}</td>
                <td>{{$dados->generico}}</td> 
                <td>{{$dados->forma}}</td> 
                <td>{{$dados->indicacao}}</td> 
                <td>{{$dados->preco}}</td> 
                <td> <a href="{{action('RemedioController@edit',$dados->id)}}">Editar</a></td>
                <td> <a href="{{action('RemedioController@remove',$dados->id)}}" onclick="return confirm('tem certeza q deseja remover?');">Remover</a></td>
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