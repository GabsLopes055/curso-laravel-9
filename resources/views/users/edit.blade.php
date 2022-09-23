@extends('layouts.app')

@section('title', 'Editar Usuários')

@section('content')

    <div class="container text-center mt-5 ">

        <h1>Editar Usuário {{ $user->name }}</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            </ul>
        @endif()
        <div class="card mt-4">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                <div class="w-50 h-50 m-auto mt-5">
                    <div class="mt-3">
                        @method('PUT')
                        @csrf
                        <h5 for="form-label">Nome Completo</h5>
                        <div class="d-flex justify-content-center">
                            <input class="form-control w-50 text-center" type="text" name="name" id="name"
                                value="{{ $user->name }}" placeholder="Informe o nome completo" autocomplete="off">
                        </div>
                        <h5 class="mt-3" for="form-label">E-mail</h5>
                        <div class="d-flex justify-content-center">
                            <input class="form-control w-50 text-center" type="email" name="email" id="email"
                                value="{{ $user->email }}" placeholder="Informe um E-mail valido" autocomplete="off">
                        </div>
                        <h5 class="mt-3" for="form-label">Senha</h5>
                        <div class="d-flex justify-content-center mb-4">
                            <input class="form-control w-50 text-center" type="password" name="password" id="password"
                                placeholder="Informe sua senha">
                        </div>
                        <button class="btn btn-outline-warning text-dark w-50" type="submit">Editar</button>
                    </div>
                </div>
            </form>

            <div class="text-center mb-4">
                <a href="{{ route('users.listAll') }}"><button class="btn btn-dark w-25 mt-4">Voltar</button></a>
            </div>
        </div>
    </div>

@endsection()
