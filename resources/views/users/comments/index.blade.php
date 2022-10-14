@extends('layouts.app');

@section('title', 'Comentário do {{ $user->name }}')

@section('content')



    <div class="text-center">

        <h1>Comentário do {{ $user->name }} <a href="{{ route('comments.create', $user->id) }}"><button
                    class="btn btn-dark rounded-circle">+</button></a></h1>

        <table class="table table-borderless table-hover mt-5 text-center">
            <thead>
                <tr>
                    <th>Conteúdo</th>
                    <th>Visível</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @foreach ($comments as $comment)
                <tbody>
                    <tr>
                        <td>{{ $comment->body }}</td>
                        <td>{{ $comment->visible ? 'Sim' : 'Não' }}</td>
                        <td><a href="{{ route('comments.edit', ['user' => $user->id, 'id' => $comment->id]) }}"><button
                                    class="btn btn-outline-warning">Editar</button></a></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <a href="{{ route('users.listAll') }}"><button class="btn btn-primary mt-5">Voltar</button></a>
    </div>


@endsection
