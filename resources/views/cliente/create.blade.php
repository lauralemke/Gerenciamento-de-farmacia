@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar novos clientes') }}</div>

                <div class="card-body">
<body>
    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{action('ClienteController@store')}}" method="post">
        @csrf
        <div class= "form-row">
        <div class="col-7">
        
        <input type="text" name="nome"  placeholder=" Nome" class="form-control" /> </br>

        
        <input type="text" name="cpf"  placeholder="CPF" class="form-control" /> </br>
        
        <input type="date" name="data_nascimento"  placeholder="Data de Nascimento" class="form-control" /> </br>
       <label for="municipio_id">Municipio</label><br>
        <select name="municipio_id"  class="form-control">

@foreach($municipio as $item)
<option value="{{$item->id}}">{{$item->nome}}</option>
@endforeach
        </select> </br>
        <br>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a  class="btn btn-outline-primary" href="{{url('cliente')}}">Voltar</a>
</div>
        </div>
</form>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection