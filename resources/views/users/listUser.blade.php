@extends('layouts.app');

@section('title', 'Listagem dos Usuários')

@section('content')
    <h1 class="text-center">Listagem dos Usuários</h1>

    <form action="{{route('users.listAll')}}" method="get" class="mt-4">
        <div class="row">
            <div class="col-11">
                <input class="form-control" type="text" name="search" placeholder="Pesquisar" autocomplete="off">
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-info">Pesquisar</button>
            </div>
        </div>
    </form>

    <table class="table table-borderless text-center table-hover mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Criado</th>
                <th></th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-outline-dark">Detalhes</a>
                    </td>
                    <td><a href="{{ route('users.edit', ['id' => $user->id]) }}"
                            class="btn btn-outline-warning text-dark">Editar</a></td>
                    <td><a href="{{ route('users.delete', ['id' => $user->id]) }}"
                            class="btn btn-outline-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mb-3"><a href="{{ route('index') }}"><button class="btn btn-primary">Voltar</button></a></div>


@endsection
