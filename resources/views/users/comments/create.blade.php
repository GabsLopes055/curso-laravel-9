@extends('layouts.app');

@section('title', 'Comentário do {{ $user->name }}')

@section('content')


    <div class="text-center">
        <h1>Comentário do {{ $user->name }}</h1>
        @include('users.includes.validations-form')
        <div class="card mt-4">
            <form action="{{ route('comment.store', $user->id) }}" method="post">
                <div class="w-50 h-50 m-auto mt-5">
                    <div class="mt-3">
                        @method('POST')
                        @include('users._partials.createCommentForm')
                    </div>
                </div>
            </form>
            <div class="text-center mb-4 ">
                <a href="{{ route('comments.index', $user->id) }}"><button class="btn btn-dark mt-3 w-50">Voltar</button></a>
            </div>
        </div>
    </div>

@endsection
