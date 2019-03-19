<?php

namespace atenagestao\Http\Controllers;

use Illuminate\Http\Request;
use atenagestao\Clientes;

class ClientesController extends Controller
{
    public function index()
    {
    	$clientes = Clientes::all();
    	return view('cadastro.clientes')->with(compact('clientes'));
    }
}
