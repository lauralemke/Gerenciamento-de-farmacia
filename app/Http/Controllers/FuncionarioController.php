<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use App\FuncionarioModel;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    public function index()
    {
        $objFuncionario = FuncionarioModel::orderBy("id")->get();
        return view('funcionario.list')->with('funcionario', $objFuncionario);
    }

    public function create()
    {
        return view("funcionario.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'cpf' => 'required',
            'data_nascimento' => 'required',
        ]);

        $objFuncionario = new FuncionarioModel();
        $objFuncionario->nome = $request->nome;
        $objFuncionario->cpf = $request->cpf;
        $objFuncionario->data_nascimento = $request->data_nascimento;

        $objFuncionario->save();

        return redirect()->action('FuncionarioController@index')
            ->with('success', 'Funcionario Salvo com sucesso.');
    }

    public function edit($id)
    {
        $objFuncionario = FuncionarioModel::findorfail($id);

        return view('funcionario.edit')->with('funcionario', $objFuncionario);
    }
/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FuncionarioModel  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $objFuncionario = FuncionarioModel::findOrfail($request->id);
        $objFuncionario->nome = $request->nome;
        $objFuncionario->cpf = $request->cpf;
        $objFuncionario->data_nascimento = $request->data_nascimento;

        $objFuncionario->save();

        return redirect()->action('FuncionarioController@index')
            ->with('success', 'Funcionario Salvo com sucesso.');
    }
    public function remove($id)
    {
        $objFuncionario = FuncionarioModel::findOrFail($id);
        $objFuncionario->delete();
        return redirect()->action('FuncionarioController@index')
            ->with('success', 'Funcionario Remover com sucesso.');
    }
    public function search(Request $request)
    {
      
        $query = DB::table('funcionario_models');
        if (!empty($request->nome)) {
            $query->where('nome', 'like', '%' .  $request->nome . '%');
        }
        if (!empty($request->cpf)) {
            $query->where('cpf', 'like', '%' .  $request->cpf . '%');
        }
        if (!empty($request->data_nascimento)) {
            $query->where('data_nascimento', 'like', '%' .  $request->data_nascimento . '%');
        }
        $objFuncionario = $query->OrderBy('id')->get();
        return view('funcionario.list')->with('funcionario', $objFuncionario);
    }
}
