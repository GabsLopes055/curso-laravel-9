@extends('layouts.app')

@section('title', 'Criar usuário')

@section('content')

    <div class="container text-center mt-5 ">
        <h1>Criando Usuário</h1>
        @include('users.includes.validations-form')
        <div class="card mt-4">
            <form action="{{ route('users.store') }}" method="post">
                <div class="w-50 h-50 m-auto mt-5">
                    <div class="mt-3">
                        @csrf
                        @include('users._partials.createUserForm')
                    </div>
                </div>
            </form>
            <div class="text-center mb-4">
                <a href="{{ route('index') }}"><button class="btn btn-dark w-25 mt-4">Voltar</button></a>
            </div>
        </div>
    </div>

@endsection()
