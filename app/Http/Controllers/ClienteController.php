<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\ClienteModel;
use App\MunicipioModel;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        $objCliente = ClienteModel::orderBy("id")->get();
        $objMunicipio = MunicipioModel::orderBy("id")->get();
        return view('cliente.list')->with('cliente', $objCliente, $objMunicipio, 'municipio');
    }

    public function create()
    {
        $objMunicipio = MunicipioModel::orderBy('id')->get();
        return view("cliente.create")->with('municipio', $objMunicipio);
    }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $objCliente = new ClienteModel();
        $objCliente->nome = $request->nome;
        $objCliente->cpf = $request->cpf;
        $objCliente->data_nascimento = $request->data_nascimento;
        $objCliente->municipio_id = $request->municipio_id ;

        $objCliente->save();
        return redirect()->action('ClienteController@index')
            ->with('success', 'Cliente Salvo com sucesso.');
    }

    public function edit($id)
    {
        $objMunicipio = MunicipioModel::orderBy('id')->get();
        $objCliente = ClienteModel::findorfail($id);
        return view('cliente.edit')->with('cliente', $objCliente)
        ->with('municipio', $objMunicipio);
    }
 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteModel  
     * * @param  \App\MunicipioModel  
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $objCliente = ClienteModel::findOrfail($request->id);
        $objCliente->nome = $request->nome;
        $objCliente->cpf = $request->cpf;
        $objCliente->data_nascimento = $request->data_nascimento;
        $objCliente->municipio_id = $request->municipio_id ;
        $objCliente->save();

        return redirect()->action('ClienteController@index')
            ->with('success', 'Cliente Salvo com sucesso.');
    }
    public function remove($id)
    {
        $objCliente = ClienteModel::findOrFail($id);
        $objCliente->delete();
        return redirect()->action('ClienteController@index')
            ->with('success', 'Cliente Remover com sucesso.');
    }
    public function search(Request $request)
    {
      /*
        $query = DB::table('cliente');
        if (!empty($request->nome)) {
            $query->where('nome', 'like', '%' .  $request->nome . '%');
        }
        if (!empty($request->cpf)) {
            $query->where('cpf', 'like', '%' .  $request->cpf . '%');
        }
        if (!empty($request->data_nascimento)) {
            $query->where('data_nascimento', 'like', '%' .  $request->data_nascimento . '%');
        }
        $objCliente = $query->OrderBy('id')->get();
        return view('cliente.list')->with('cliente', $objCliente);
    }*/
    if (!empty($request->nome)) {
        $objCliente = ClienteModel::where('nome', 'like', '%' . $request->nome . '%')->get();
    } else if (!empty($request->cpf)) {
        $objCliente = ClienteModel::where('cpf', 'like', '%' . $request->cpf . '%')->get();
    } else if (!empty($request->data_nascimento)) {
        $objCliente = ClienteModel::where('data_nascimento', 'like', '%' . $request->data_nascimento . '%')->get();
    } else {
        $objCliente = ClienteModel::orderBy('id')->get();
    }
    return view('cliente.list')->with('cliente', $objCliente);
}
}
