@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar funcionários') }}</div>
                <form action="{{action('FuncionarioController@update')}}" method="POST">

                    @csrf
                    @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <input type="hidden" name="id" value="{{$funcionario->id}}">
                    <div class="form-row">
                        <div class="col">
                            <label>Nome</label><br>
                            <input type="text" name="nome" class="form-control" value="{{$funcionario->nome}}"><br>
                        </div>

                        <div class="col">
                            <label>CPF</label><br>
                            <input type="text" name="cpf" class="form-control" value="{{$funcionario->cpf}}"><br>
                        </div>
                        <div class="col">

                            <label>Data de nascimento</label><br>
                            <input type="date" name="data_nascimento" class="form-control" value="{{$funcionario->data_nascimento}}"><br>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                Salvar</button>

                            <a href="{{url('funcionario')}}" class="btn btn-outline-primary">
                                Voltar</a>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection