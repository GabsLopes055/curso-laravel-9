<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index() {

        return view('index');
    }

    public function listAll()
    {

        $users = User::get();

        return view('users.listUser', ['users' => $users]);
    }

    public function show($id)
    {
        // $users = User::where('id', $id)->first();

        $erro = 'Usuário não encontrado';

        

        if (!$users = User::find($id)) {
            return redirect()->route('users.listAll', ['erro' => $erro]);
        } else {           
            return view('users.show', ['users' => $users]);
        }


        dd($users);
    }

    public function create() {
        return view('users.create');
    }
}
