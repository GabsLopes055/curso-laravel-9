@extends('layouts.app');

@section('title', 'Cadastrando endereço')

@section('content')

    <div class="text-center">

        <h1>Cadastrando Endereço</h1>
        <hr>
        <div class="row">
           <form action="{{route('cep.store', $user->id)}}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-8">
                    <input class="form-control" type="tel" name="cep" id="cep" placeholder="Informe um CEP" maxlength="8">
                </div>
                <div class="col-4">
                    <button class="btn btn-dark w-100" type="submit">Consultar</button>
                </div>
            </div>
           </form>
        </div>
        <a href="{{ route('cep.listAll', $user->id) }}"><button class="btn btn-primary">Voltar</button></a>
    </div>

@endsection
