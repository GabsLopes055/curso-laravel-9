<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {

        $users = User::get();

        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        // $users = User::where('id', $id)->first();

        $erro = 'Usuário não encontrado';

        

        if (!$users = User::find($id)) {
            return redirect()->route('users.index', ['erro' => $erro]);
        } else {           
            return view('users.show', ['users' => $users]);
        }


        dd($users);
    }
}
