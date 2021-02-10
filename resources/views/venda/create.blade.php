@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar novas vendas') }}</div>

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

    <form action="{{action('VendaController@store')}}" method="post">
        @csrf
        <div class= "form-row">
        <div class="col-7">
        
        <input type="date" name="data_venda"  placeholder="data da venda" class="form-control" /> </br>

        
        <input type="time" name="hora_venda"  placeholder="hora da venda" class="form-control" /> </br>
        
        <label for="cliente_id">Cliente</label><br>
        <select name="cliente_id"  class="form-control">

@foreach($cliente as $item)
<option value="{{$item->id}}">{{$item->nome}}</option>
@endforeach
        </select> </br>

        <label for="funcionario_models_id">Funcionario</label><br>
        <select name="funcionario_models_id"  class="form-control">

@foreach($funcionario as $item)
<option value="{{$item->id}}">{{$item->nome}}</option>
@endforeach
        </select> </br>

       <label for="remedio_models_id">Medicamento</label><br>
        <select name="remedio_models_id"  class="form-control">

@foreach($remedio as $item)
<option value="{{$item->id}}">{{$item->nome}}</option>
@endforeach
        </select> </br>
        <br>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a  class="btn btn-outline-primary" href="{{url('Venda')}}">Voltar</a>
</div>
        </div>
    </form>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection