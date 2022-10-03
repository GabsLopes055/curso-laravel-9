<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }


    public function auth(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
           'email.required' => 'E-email é obrigatório !',
           'password.required' => 'Senha é obrigatória !'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('index');
        } else {
            notify()->warning('O usuário informado não existe na base de dados !', 'Usuário não encontrado');
            return back();
        };
    }
}
