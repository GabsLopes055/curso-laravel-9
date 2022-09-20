@extends('layouts.app')

@section('title', 'Criar usuário')

@section('content')

    <div class="container text-center mt-5 ">

        <h1>Criando Usuário</h1>

        <form action="{{route('users.store')}}" method="post">
            <div class="card w-50 h-50 m-auto mt-5">
                <div class="mt-3">
                    @csrf
                    <h5 for="form-label">Nome Completo</h5>
                    <div class="d-flex justify-content-center">
                        <input class="form-control w-50 text-center" type="text" name="name" id="name"
                            placeholder="Informe o nome completo" autocomplete="off">
                    </div>
                    <h5 class="mt-3" for="form-label">E-mail</h5>
                    <div class="d-flex justify-content-center">
                        <input class="form-control w-50 text-center" type="email" name="email" id="email"
                            placeholder="Informe um E-mail valido" autocomplete="off">
                    </div>
                    <h5 class="mt-3" for="form-label">Senha</h5>
                    <div class="d-flex justify-content-center mb-4">
                        <input class="form-control w-50 text-center" type="password" name="password" id="password"
                            placeholder="Informe sua senha">
                    </div>
                    <button class="btn btn-success w-50 mb-4" type="submit">Cadastrar</button>
                </div>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('index') }}"><button class="btn btn-dark w-25 mt-4">Voltar</button></a>
        </div>

    </div>

@endsection()
