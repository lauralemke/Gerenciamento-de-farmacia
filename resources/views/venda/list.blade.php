@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Listagem de vendas') }}<a href="/home"><button class="btn btn-outline-primary" style="float: right;">Voltar</button></a></div>

                <div class="card-body">

                    <a class="btn btn-primary btn-lg btn-block" href="{{url('/venda/create')}}">Cadastrar Novas Vendas</a>
                    <br>
                    <form action="{{ action('VendaController@search')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-5">
                                <input type="text" placeholder="Pesquisar Cliente ID" class="form-control" name="cliente_id" />
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="Pesquisar Medicamento ID" class="form-control" name="remedio_models_id" />
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="Pesquisar Data de venda" class="form-control" name="data_venda" />
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                        <br>
                    </form>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                             <th scope="col">Cliente</th>
                                <th scope="col">Medicamento</th>
                                <th scope="col">Data da venda</th>
                                <th scope="col">Hora da venda</th>
                                <th scope="col">Funcionário</th>
                                <th scope="col">Ação</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($venda as $dados)
                            <tr>
                                <td>{{$dados->id}}</td>
                                <td>{{$dados->cliente->nome}}</td>
                                <td>{{$dados->remedio_models->nome}}</td>
                                <td>{{$dados->data_venda}}</td>
                                <td>{{$dados->hora_venda}}</td>
                                <td>{{$dados->funcionario_models->nome}}</td>
                                <td> <a href="{{action('VendaController@edit',$dados->id)}}">Editar</a></td>
                                <td> <a href="{{action('VendaController@remove',$dados->id)}}" onclick="return confirm('tem certeza q deseja remover?');">Remover</a></td>
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