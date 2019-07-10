<?php

namespace atenagestao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use atenagestao\User;

class loginController extends Controller
{
    public function post_login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'senha' => $request->senha])) {
            return view('template');
        }else{
            return redirect('/');
        }
    }

    public function sair()
    {
       Auth::logout();
       return redirect('/');
    }
}
