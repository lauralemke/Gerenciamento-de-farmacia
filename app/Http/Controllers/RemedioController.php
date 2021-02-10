<?php

namespace App\Http\Controllers;

use App\RemedioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class RemedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $objRemedio = RemedioModel::orderBy("id")->get();

        return view('remedio.list')->with('remedio', $objRemedio);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('remedio.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objRemedio = new RemedioModel();
        $objRemedio->nome = $request->nome;
        $objRemedio->faixa_preta = $request->faixa_preta;
        $objRemedio->generico = $request->generico;
        $objRemedio->forma = $request->forma;
        $objRemedio->indicacao = $request->indicacao;
        $objRemedio->preco = $request->preco;
        $objRemedio->save();

        return redirect()->action('RemedioController@index')->with('success', 'Medicamento salvo!');
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RemedioModel  $RemedioModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //select * from Remedio where id = $id
        $objRemedio = RemedioModel::findOrfail($id);

        return view('remedio.edit')->with('Remedio', $objRemedio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RemedioModel  $RemedioModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $objRemedio = RemedioModel::findOrfail($request->id);
        $objRemedio->nome = $request->nome;
        $objRemedio->faixa_preta = $request->faixa_preta;
        $objRemedio->generico = $request->generico;
        $objRemedio->forma = $request->forma;
        $objRemedio->indicacao = $request->indicacao;
        $objRemedio->preco = $request->preco;
        $objRemedio->save();

        $objRemedio->save();

        return redirect()->action('RemedioController@index')
            ->with('success', 'Medicamento Salvo com sucesso.');
    }

    /**
     * @param  \App\RemedioModel  $RemedioModel
     * @return \Illuminate\Http\Response
     */

    public function remove($id)
    {
        //
        $objRemedio = RemedioModel::findOrfail($id);
        $objRemedio->delete();

        return redirect()->action('RemedioController@index')
            ->with('success', 'Medicamento Removido com sucesso.');
    }

    public function search(Request $request)
    {

        $query = DB::table('remedio_models');

        if (!empty($request->nome)) {
            $query->where('nome', 'like',  '%' . $request->nome . '%');
        }

        if (!empty($request->indicacao)) {
            $query->where('indicacao', 'like', '%' . $request->indicacao . '%');
        }

        $objRemedio = $query->orderBy('id')->get();

        return view('remedio.list')->with('remedio', $objRemedio);
    }
}
