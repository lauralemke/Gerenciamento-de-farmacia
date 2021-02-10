<?php

namespace App\Http\Controllers;
use App\ClienteModel;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function geraPDF(){
$cliente=ClienteModel::all();

$PDF = PDF::loadView('PDF', compact('cliente'));
return $PDF->setPaper('a4')->stream('todos_Clientes.pdf');
    }
}
