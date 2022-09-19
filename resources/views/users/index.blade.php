@extends('layouts.app');

@section('title', 'Listagem dos Usuários')

@section('content')
    <h1 class="text-center">Listagem dos Usuários</h1>
    <table class="table table-borderless text-center mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Criado</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($users as $user)
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('users.show', ['id' => $user->id]) }}"><button
                                class="btn btn-outline-dark">Detalhes</button></a></td>
                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
