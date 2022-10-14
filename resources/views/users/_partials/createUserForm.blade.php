@csrf
<h5 for="form-label">Nome Completo</h5>
<div class="d-flex justify-content-center">
    <input class="form-control w-50 text-center" type="text" name="name" id="name" value="{{ $user->name ?? old('name') }}"
        placeholder="Informe o nome completo" autocomplete="off">
</div>
<h5 class="mt-3" for="form-label">E-mail</h5>
<div class="d-flex justify-content-center">
    <input class="form-control w-50 text-center" type="email" name="email" id="email"
        value="{{ $user->email ?? old('email') }}" placeholder="Informe um E-mail valido" autocomplete="off">
</div>
<h5 class="mt-3" for="form-label">Senha</h5>
<div class="d-flex justify-content-center mb-4">
    <input class="form-control w-50 text-center" type="password" name="password" id="password"
        placeholder="Informe sua senha">
</div>
<button class="btn btn-outline-warning text-dark w-50" type="submit">Enviar</button>
