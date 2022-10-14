<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\notify;

class userController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index()
    {
        return view('index');
    }

    public function listAll(Request $request)
    {
        // $search = $request->search;
        $users = $this->model->getUsers(search: $request->get('search', ''));
        // if ($request->search != '') {
        //     $users = User::where("name", "LIKE", "%{$request->search}%")->get();
        //     // dd($users);
        // } else {
        //     $users = User::get();
        // }
        // // dd($request->search);

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
        notify()->success('Usuário Cadastrado', 'Novo Usuário');
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

    public function update(StoreUpdateUser $request, $id)
    {
        if (!$user = User::find($id)) {
            notify()->error('Error', 'Usuário não encontrado');
            return redirect()->route('users.listAll');
        } else {
            $data = $request->only('name', 'email');

            if ($request->password) {
                $data['password'] = bcrypt($request->password);
                if ($user->update($data)) {
                    notify()->warning('Usuário editado com sucesso !', 'Usuário Editado');
                    return redirect()->route('users.listAll');
                } else {
                    notify()->error('Erro ao editar Usuário !', 'Erro ao editar');
                    return redirect()->route('users.listAll');
                }
            } else {
                notify()->error('Erro ao editar Usuário !', 'Erro ao editar');
                return redirect()->route('users.listAll');
            }
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        if (!User::find($id)) {
            notify()->error('Usuário não encontrado', 'Error');
            return redirect()->route('users.listAll');
        } else {
            return view('users.delete', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        if (!User::find($id)) {
            notify()->error('Usuário não encontrado', 'Error');
            return redirect()->route('users.listAll');
        } else {
            if (User::find($id)->delete()) {
                notify()->success('Usuário excluido', 'Excluido');
                return redirect()->route('users.listAll');
            } else {
                notify()->error('Erro ao excluir usuário', 'Error');
                return redirect()->route('users.listAll');
            }
        }
    }
}
