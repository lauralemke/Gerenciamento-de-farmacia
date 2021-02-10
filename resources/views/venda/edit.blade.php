@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar venda') }}</div>
                <form action="{{action('VendaController@update')}}" method="POST">

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


                    <input type="hidden" name="id" value="{{$venda->id}}">
                    <div class="form-row">
                        <div class="col">
                            <label>Data da venda</label><br>
                            <input type="date" name="data_venda" class="form-control" value="{{$venda->data_venda}}"><br>
                        </div>

                        <div class="col">
                            <label>Hora da venda</label><br>
                            <input type="time" name="hora_venda" class="form-control" value="{{$venda->hora_venda}}"><br>
                        </div>
                        <div class="col-xs-2">
                            <label for="cliente_id">Cliente</label><br>
                            <select class="form-control" name="cliente_id">
                           
                            @foreach($cliente as $item)
                                <option value="{{ $item->id }}"
                                @if ($item->id == old('venda_id', $venda->cliente_id))
                                        selected="selected"
                                        
                                @endif
                                        >{{$item->nome}}</option>
                                    @endforeach
                            </select>

                            <br></div>
                        <div class="col-xs-2">
                            <label for="remedio_models_id">Medicamento</label><br>
                            <select class="form-control" name="remedio_models_id">

                               @foreach($remedio as $item)
                                <option value="{{ $item->id }}"
                                @if ($item->id == old('venda_id', $venda->remedio_models_id))
                                        selected="selected"
                                        
                                @endif
                                        >{{$item->nome}}</option>
                                    @endforeach
                            </select>
                            <br></div>

                        <div class="col-xs-2">
                            <label for="funcionario_models_id">Funcionário</label><br>
                            <select class="form-control" name="funcionario_models_id">

                                @foreach($funcionario as $item)
                                <option value="{{ $item->id }}"
                                @if ($item->id == old('venda_id', $venda->funcionario_models_id))
                                        selected="selected"
                                        
                                @endif
                                        >{{$item->nome}}</option>
                                    @endforeach
                            </select>
                            <br></div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                Salvar</button>

                            <a href="{{url('venda')}}" class="btn btn-outline-primary">
                                Voltar</a>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection