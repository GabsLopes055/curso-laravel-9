@extends('layouts.app')

@section('title', 'Deletar Usuário')

@section('content')

    <div class="card text-center mt-5">
        <div class="card-header">
            <h1>Excluir Usuário: {{ $id }}</h1>
        </div>
        <h5 class="mt-5">Deseja excluir este usuario</h5>
        <form action="{{ route('users.destroy', $id) }}" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <button class="btn btn-danger w-25 mt-4">Excluir</button>
        </form>
        <div class="text-center mb-4">
            <a href="{{ route('users.listAll') }}"><button class="btn btn-dark w-25 mt-4">Voltar</button></a>
        </div>
    </div>
@endsection
