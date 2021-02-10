@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar novos MEDICAMENTOS') }}</div>

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
    <form action="{{action('RemedioController@store')}}" method="post">
        @csrf
        <div class= "form-row">
        <div class="col-7">
        
        <input type="text" name="nome"  placeholder=" Nome" class="form-control" /> </br>

        
        <input type="text" name="faixa_preta"  placeholder="Faixa Preta" class="form-control" /> </br>
        
        <input type="text" name="generico"  placeholder="Genérico" class="form-control" /> </br>

        <input type="text" name="forma"  placeholder="Forma" class="form-control" /> </br>

        <input type="text" name="indicacao"  placeholder="Indicação" class="form-control" /> </br>

        <input type="text" name="preco"  placeholder="Preço" class="form-control" /> </br>
        <br>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a  class="btn btn-outline-primary" href="{{url('remedio')}}">Voltar</a>
</div>
        </div>
    </form>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection