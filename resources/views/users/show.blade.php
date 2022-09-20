@extends('layouts.app')

@section('title', 'Listagem de usuário')

@section('content')
    <h1 class="text-center">Detalhes do Usuário {{ $users->name }}</h1>

    <table class="table table-borderless text-center mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Criado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $users->id }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->created_at }}</td>
                <td><a href="{{ route('users.show', ['id' => $users->id]) }}"><button
                            class="btn btn-warning">Editar</button></a></td>

            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{ route('users.listAll') }}"><button class="btn btn-primary">Voltar</button></a>
    </div>
@endsection
