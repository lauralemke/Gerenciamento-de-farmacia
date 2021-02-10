<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {


    Route::get('/aluno', 'AlunoController@index');
    Route::get('/aluno/edit/{id}', 'AlunoController@edit'); //chama o formulario
    Route::get('/aluno/remove/{id}', 'AlunoController@remove');
    Route::post('/aluno/search/', 'AlunoController@search');
    Route::post('/aluno/update/', 'AlunoController@update');
    Route::get('/aluno/create', 'AlunoController@create'); //carrega o formulário
    Route::post('/aluno/store', 'AlunoController@store'); //salvar os dados do formulário

    Route::get('/cliente', 'ClienteController@index');
    Route::get('/cliente/edit/{id}', 'ClienteController@edit'); //chama o formulario
    Route::get('/cliente/remove/{id}', 'ClienteController@remove');
    Route::post('/cliente/search/', 'ClienteController@search');
    Route::post('/cliente/update/', 'ClienteController@update');
    Route::get('/cliente/create', 'ClienteController@create'); //carrega o formulário
    Route::post('/cliente/store', 'ClienteController@store');

    Route::get('/venda', 'VendaController@index');
    Route::get('/venda/edit/{id}', 'VendaController@edit'); //chama o formulario
    Route::get('/venda/remove/{id}', 'VendaController@remove');
    Route::post('/venda/search/', 'VendaController@search');
    Route::post('/venda/update/', 'VendaController@update');
    Route::get('/venda/create', 'VendaController@create'); //carrega o formulário
    Route::post('/venda/store', 'VendaController@store');


    Route::get('/funcionario', 'FuncionarioController@index');
    Route::get('/funcionario/edit/{id}', 'FuncionarioController@edit'); //chama o formulario
    Route::get('/funcionario/remove/{id}', 'FuncionarioController@remove');
    Route::post('/funcionario/search/', 'FuncionarioController@search');
    Route::post('/funcionario/update/', 'FuncionarioController@update');
    Route::get('/funcionario/create', 'FuncionarioController@create'); //carrega o formulário
    Route::post('/funcionario/store', 'FuncionarioController@store');

    Route::get('/curso', 'CursoController@index');
    Route::get('/curso/create', 'CursoController@create'); //carrega o formulário
    Route::post('/curso/store', 'CursoController@store');
    Route::post('/curso/search/', 'CursoController@search');
    Route::get('/curso/edit/{id}', 'CursoController@edit');
    Route::get('/curso/remove/{id}', 'CursoController@remove');
    Route::post('/curso/update/', 'CursoController@update'); //salvar os dados do formulário

    Route::get('/remedio', 'RemedioController@index');
    Route::get('/remedio/create', 'RemedioController@create'); //carrega o formulário
    Route::post('/remedio/store', 'RemedioController@store');
    Route::post('/remedio/search/', 'RemedioController@search');
    Route::get('/remedio/edit/{id}', 'RemedioController@edit');
    Route::get('/remedio/remove/{id}', 'RemedioController@remove');
    Route::post('/remedio/update/', 'RemedioController@update'); //salvar os dados do formulário

Route::get('PDF', 'PDFController@geraPDF');

    
});
