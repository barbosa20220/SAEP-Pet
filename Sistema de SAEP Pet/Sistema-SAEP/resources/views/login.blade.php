@section('title','Entrar - SAEP Pet')
@section('content')
<div class="row justify-content-center mt-5"><div class="col-md-5"><div class="card p-4">
<h2 class="page-title text-center">🐾 SAEP Pet</h2><p class="text-secondary text-center">Entre para gerenciar tutores, pets e agendamentos.</p>
<form method="POST" action="{{ route('entrar') }}">@csrf
<div class="mb-3"><label class="form-label">E-mail</label><input class="form-control" type="email" name="email" value="{{ old('email') }}" required></div>
<div class="mb-3"><label class="form-label">Senha</label><input class="form-control" type="password" name="senha" required></div>
<button class="btn btn-primary w-100">Entrar</button>
</form><p class="text-center mt-3 mb-0">Não tem conta? <a href="{{ route('cadastro') }}">Criar cadastro</a></p>
</div></div></div>
