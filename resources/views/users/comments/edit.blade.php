@extends('layouts.app');

@section('title', 'Editando comentário do {{$user->name}}')

@section('content')


    <div class="text-center">
        <h1>Editando comentário do {{$user->name}}</h1>
        @include('users.includes.validations-form')
        <div class="card mt-4">
            <form action="{{route('comments.update', $comment->id)}}" method="post">
                <div class="w-50 h-50 m-auto mt-5">
                    <div class="mt-3">
                        @method('PUT')
                        @include('users._partials.createCommentForm')
                    </div>
                </div>
            </form>
            <div class="text-center mb-4 ">
                <a href="{{route('comments.index', $user->id)}}"><button class="btn btn-dark mt-3 w-50">Voltar</button></a>
            </div>
        </div>
    </div>

@endsection
