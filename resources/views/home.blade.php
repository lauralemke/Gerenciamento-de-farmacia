@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    <div class="col-sm-3">
            <div class="thumbnail">
                    <a href="cliente/">
                     <img src="https://www.flaticon.com/svg/static/icons/svg/2621/2621814.svg" style="width:90%">
            <div class="caption">
            <h2 align="center">Cliente</h2>
            </div>
            </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail">
                    <a href="remedio/">
                     <img src="https://www.flaticon.com/svg/static/icons/svg/2621/2621776.svg" style="width:90%">
            <div class="caption">
            <h2 align="center">Medicamento</h2>
            </div>
            </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail">
                    <a href="funcionario/">
                     <img src="https://www.flaticon.com/svg/static/icons/svg/2621/2621548.svg" style="width:90%">
            <div class="caption">
            <h2 align="center">Funcionário</h2>
            </div>
            </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail">
                    <a href="venda/">
                     <img src="https://www.flaticon.com/svg/static/icons/svg/2621/2621820.svg" style="width:90%">
            <div class="caption">
            <h2 align="center">Vendas</h2>
            </div>
            </a>
            </div>
        </div>
                    </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
