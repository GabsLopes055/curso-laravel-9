@extends('layouts.app');

@section('title', 'Listagem de CEP {{ $user->name }}')

@section('content')

    <div class="text-center">
        <h1>Endereço do usuário {{ $user->name }}  <a href="{{route('cep.create', $user->id)}}"><button class="btn btn-success">Cadastrar Endereço</button></a></h1>
        <table class="table table-borderless table-hover mt-5">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Quadra</th>
                    <th>Nª / Lote</th>
                    <th>CEP</th>
                    <th class="text-center">Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->name}}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{route('users.listAll')}}"><button class="btn btn-primary">Voltar</button></a>
    </div>

@endsection
