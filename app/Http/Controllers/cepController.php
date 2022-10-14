<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cep;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class cepController extends Controller
{
    protected $cep;
    protected $user;

    public function __construct(cep $cep, User $user)
    {
        $this->cep = $cep;
        $this->user = $user;
    }

    public function index($userId)
    {

        if (!$user = $this->user->find($userId)) {
            return redirect()->back();
        } else {
            return view('users.cep.listAll', compact('user'));
        }
    }

    public function create($userId)
    {
        if (!$user = $this->user->find($userId)) {
            return redirect()->back();
        } else {
            return view('users.cep.createCep', compact('user'));
        }
    }


    public function store(Request $request)
    {
        if (empty($request->cep)) {
            return redirect()->back();
        }

        $response = Http::get('https://viacep.com.br/ws/".$request->cep."/json/');
        dd($response);
    }
}
