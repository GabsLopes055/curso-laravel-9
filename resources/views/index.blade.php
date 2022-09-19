@extends('layouts.app')

@section('title', 'Index')

@section('content')

<div class="text-center mt-4">
    <h1>Gerenciamento de Usuários</h1>
</div>
<div class="row mt-5 text-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Cadastrar Usuário</h4>
            </div>
            <div class="car-body">
                <p class="mt-2">Formulário para cadastramento de novos usuários</p>
            </div>
            <div class="card-footer">
                <a href="{{route('users.create');}}"><button class="btn btn-outline-dark">Cadastrar</button></a>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Listagem dos Usuários</h4>
            </div>
            <div class="car-body">
                <p class="mt-2">Tabela com todos os usuários cadastrados</p>
            </div>
            <div class="card-footer">
                <a href="{{route('users.listAll');}}"><button class="btn btn-outline-dark">Listar</button></a>
            </div>
        </div>
    </div>
</div>



@endsection