<?php

namespace App\Http\Controllers;

use App\Venda;
use Illuminate\Http\Request;
use App\ClienteModel;
use App\FuncionarioModel;
use App\MunicipioModel;
use App\RemedioModel;
use App\VendaModel;
use Illuminate\Support\Facades\DB;
use stdClass;

class VendaController extends Controller
{
    public function index()
    {
        $objVenda = VendaModel::orderBy("id")->get();
        return view('venda.list')->with('venda', $objVenda);
    }

    public function create()
    {
        $objCliente = ClienteModel::orderBy('id')->get();
        $objFuncionario = FuncionarioModel::orderBy('id')->get();
        $objRemedio = RemedioModel::orderBy('id')->get();
        return view("venda.create")
            ->with('cliente', $objCliente)
            ->with('funcionario', $objFuncionario)
            ->with('remedio', $objRemedio);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objVenda = new VendaModel();
        $objVenda->cliente_id = $request->cliente_id;
        $objVenda->funcionario_models_id = $request->funcionario_models_id;
        $objVenda->remedio_models_id = $request->remedio_models_id;
        $objVenda->data_venda = $request->data_venda;
        $objVenda->hora_venda = $request->hora_venda;
        $objVenda->save();
        return redirect()->action('VendaController@index')
            ->with('success', 'Venda Salvo com sucesso.');
    }

    public function edit($id)
    {
        $objVenda = VendaModel::findorfail($id);
        $objCliente = ClienteModel::orderBy('id')->get();
        $objFuncionario = FuncionarioModel::orderBy('id')->get();
        $objRemedio = RemedioModel::orderBy('id')->get();
        return view('venda.edit')->with('venda', $objVenda)
            ->with('cliente', $objCliente)
            ->with('funcionario', $objFuncionario)
            ->with('remedio', $objRemedio);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VendaModel  
     * * @param  \App\MunicipioModel  
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $objVenda = VendaModel::findOrfail($request->id);
        $objVenda->cliente_id = $request->cliente_id;
        $objVenda->remedio_models_id = $request->remedio_models_id;
        $objVenda->funcionario_models_id  = $request->funcionario_models_id;
        $objVenda->data_venda = $request->data_venda;
        $objVenda->hora_venda = $request->hora_venda;
        $objVenda->save();

        return redirect()->action('VendaController@index')
            ->with('success', 'Venda Salvo com sucesso.');
    }
    public function remove($id)
    {
        $objVenda = VendaModel::findOrFail($id);
        $objVenda->delete();
        return redirect()->action('VendaController@index')
            ->with('success', 'Venda Remover com sucesso.');
    }
    public function search(Request $request)
    {
        /*
        $query = DB::table('venda_models');
        if (!empty($request->cliente_id)) {
            $query->where('cliente_id', 'like', '%' .  $request->cliente_id . '%');
        }
        if (!empty($request->remedio_models_id)) {
            $query->where('remedio_models_id', 'like', '%' .  $request->remedio_models_id . '%');
        }
        if (!empty($request->data_venda)) {
            $query->where('data_venda', 'like', '%' .  $request->data_venda . '%');
        }
        $objVenda = $query->OrderBy('id')->get();
        */

        if (!empty($request->cliente_id)) {
            $objVenda = VendaModel::where('cliente_id', '=',  $request->cliente_id)->get();
        } else if (!empty($request->remedio_models_id)) {
            $objVenda = VendaModel::where('remedio_models_id', '=', $request->remedio_models_id )->get();
        } else if (!empty($request->data_venda)) {
            $objVenda = VendaModel::where('data_venda', 'like', '%' . $request->data_venda . '%')->get();
        } else {
            $objVenda = VendaModel::orderBy('id')->get();
        }
        return view('venda.list')->with('venda', $objVenda);
    }
}
