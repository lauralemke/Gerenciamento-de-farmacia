@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar medicamento') }}</div>
    <form action="{{action('RemedioController@update')}}" method="POST">

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
  
        <input type="hidden" name="id" value="{{$Remedio->id}}">
        <div class="form-row">
                            <div class="col-xs-2">
        <label>Nome</label><br>
        <input type="text" name="nome" class="form-control" value="{{$Remedio->nome}}"><br>
                            </div>
                        
                            <div class="col-xs-2">
        <label>Faixa preta</label><br>
        <input type="text" name="faixa_preta" class="form-control" value="{{$Remedio->faixa_preta}}"><br>
                            </div>
                            <div class="col-xs-2">

        <label>Genérico</label><br>
        <input type="text" name="generico" class="form-control" value="{{$Remedio->generico}}"><br>
                            </div>
                            <div class="col-xs-2">

        <label>Forma</label><br>
        <input type="text" name="forma" class="form-control" value="{{$Remedio->forma}}"><br>
                            </div>
                            <div class="col-xs-2">

        <label>Indicação</label><br>
        <input type="text" name="indicacao" class="form-control" value="{{$Remedio->indicacao}}"><br>
                            </div>
                            <div class="col">

        <label>Preço</label><br>
        <input type="text" name="preco" class="form-control" value="{{$Remedio->preco}}"><br>
                            </div>
<br>
<div class="col">
        <button type="submit" class="btn btn-primary">
                                    Salvar</button>

    <a href="{{url('remedio')}}"class="btn btn-outline-primary" > 
                                    Voltar</a>
</div>
    </form>

    </div>
            </div>
        </div>
    </div>
</div>
@endsection