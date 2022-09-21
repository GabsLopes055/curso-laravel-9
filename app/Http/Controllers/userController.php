<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\notify;

class userController extends Controller
{
    public function index()
    {
        notify()->success('Teste', 'Titulo');
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

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('users.listAll');
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();
    }

    public function edit($id)
    {

        if (!$user = User::find($id)) {
            return redirect()->route('users.listAll');
        } else {
            return view('users.edit', compact('user'));
        }
    }

    public function update(Request $request)
    {

        $user = User::find($request->id);
    }
}
