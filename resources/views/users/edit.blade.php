@extends('layouts.app')

@section('title', 'Editar Usuários')

@section('content')

    <div class="container text-center mt-5 ">

        <h1>Editar Usuário {{ $user->name }}</h1>

        @include('users.includes.validations-form')
        
        <div class="card mt-4">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                <div class="w-50 h-50 m-auto mt-5">
                    <div class="mt-3">
                        @method('PUT')
                        @include('users._partials.createUserForm')
                    </div>
                </div>
            </form>

            <div class="text-center mb-4">
                <a href="{{ route('users.listAll') }}"><button class="btn btn-dark w-25 mt-4">Voltar</button></a>
            </div>
        </div>
    </div>

@endsection()
