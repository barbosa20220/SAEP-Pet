@extends('layouts.app')
@section('title','Cadastro - SAEP Pet')
@section('content')
<div class="row justify-content-center mt-4"><div class="col-md-6"><div class="card p-4">
<h2 class="page-title">Criar usuário</h2>
<form method="POST" action="{{ route('registrar') }}">@csrf
<div class="mb-3"><label class="form-label">Nome</label><input class="form-control" name="nome" value="{{ old('nome') }}" required></div>
<div class="mb-3"><label class="form-label">E-mail</label><input class="form-control" type="email" name="email" value="{{ old('email') }}" required></div>
<div class="mb-3"><label class="form-label">Senha (mínimo 8 caracteres)</label><input class="form-control" type="password" name="senha" required></div>
<div class="mb-3"><label class="form-label">Confirme a senha</label><input class="form-control" type="password" name="senha_confirmation" required></div>
<button class="btn btn-primary">Cadastrar</button> <a class="btn btn-outline-secondary" href="{{ route('login') }}">Voltar</a>
</form></div></div></div>
@endsection
