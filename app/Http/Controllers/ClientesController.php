<?php

namespace atenagestao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use atenagestao\Clientes;


class ClientesController extends Controller
{
    public function index(Request $get, $pre = null)
    {
    	if($get->busca && $pre == null){
            $clientes =  Clientes::where('rs_nome', 'like', '%'.$get->busca.'%')->where('situacao','!=','pre-cadastro')->Paginate(10);
        }elseif($get->busca && $pre == 'pre-cadastro'){
            $clientes = Clientes::where('rs_nome', 'like', '%'.$get->busca.'%')->where('situacao','pre-cadastro')->Paginate(10);
        }else{

            if($pre == 'pre-cadastro'){
                $clientes = Clientes::where('situacao','pre-cadastro')->Paginate(10);

            }else{
                $clientes = Clientes::where('situacao','!=','pre-cadastro')->Paginate(10); 
            }

        }
       

      
        return view('cadastro.cliente.clientes')->with(compact('clientes', 'pre'));
    }

    public function cadastrar(Request $request)
    {
    	Clientes::create($request->all());
    	return back(); //redirect(route('cadastros.clientes'));
    }

    public function editar(Request $request, $id)
    {
        $cliente = Clientes::find($id);
        $cliente->update($request->all());
        $cliente->save();
        return  redirect(route('cadastros.ficha',$id));
    }
    public function ficha($id)
    {
        $cliente = Clientes::find($id);
        return view('cadastro.cliente.fichacliente')->with(compact('cliente'));
    }

    public function excluir($id)
    {
    	$delete = Clientes::find($id);
        $situacao = ( ($delete->situacao == 'pre-cadastro') ? 'pre-cadastro' : null ) ;
    	$delete->delete();
    	return redirect(route('cadastros.clientes',$situacao));
    }

}
