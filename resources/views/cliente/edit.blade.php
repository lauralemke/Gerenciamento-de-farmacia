@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar cliente') }}</div>
    <form action="{{action('ClienteController@update')}}" method="POST">

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


        <input type="hidden" name="id" value="{{$cliente->id}}">
        <div class="form-row">
                            <div class="col">
        <label>Nome</label><br>
        <input type="text" name="nome" class="form-control" value="{{$cliente->nome}}"><br>
                            </div>
                        
                            <div class="col">
        <label>CPF</label><br>
        <input type="text" name="cpf" class="form-control" value="{{$cliente->cpf}}"><br>
                            </div>
                            <div class="col">

        <label>Data de nascimento</label><br>
        <input type="date" name="data_nascimento" class="form-control" value="{{$cliente->data_nascimento}}"><br>
                            </div>
                            <div class="col-xs-2">
                            <label for="municipio_id"> Município</label><br>
                            <select class="form-control" name="municipio_id">
                           
                            @foreach($municipio as $item)
                                <option value="{{ $item->id }}"
                                @if ($item->id == old('cliente_id', $cliente->municipio_id))
                                        selected="selected"
                                        
                                @endif
                                        >{{$item->nome}}</option>
                                    @endforeach
                            </select>

                            <br></div>
<br>
<div class="col">
        <button type="submit" class="btn btn-primary">
                                    Salvar</button>

    <a href="{{url('cliente')}}"class="btn btn-outline-primary" > 
                                    Voltar</a>
</div>
    </form>

    </div>
            </div>
        </div>
    </div>
</div>
@endsection