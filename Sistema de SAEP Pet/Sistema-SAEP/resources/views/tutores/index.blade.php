@extends('layouts.app')
@section('title','Tutores')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h1 class="page-title">Tutores</h1><a class="btn btn-primary" href="{{ route('tutores.create') }}">+ Novo tutor</a></div>
<form class="mb-3" method="GET"><div class="input-group"><input class="form-control" name="pesquisa" value="{{ request('pesquisa') }}" placeholder="Pesquisar por nome"><button class="btn btn-outline-primary">Pesquisar</button></div></form>
<div class="card p-3"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Nome</th><th>CPF</th><th>Telefone</th><th>E-mail</th><th>Ações</th></tr></thead><tbody>
@forelse($tutores as $t)<tr><td>{{ $t->nome }}</td><td>{{ $t->cpf ?: '—' }}</td><td>{{ $t->telefone }}</td><td>{{ $t->email }}</td><td class="d-flex gap-2"><a class="btn btn-sm btn-outline-primary" href="{{ route('tutores.edit',$t->id) }}">Editar</a><form method="POST" action="{{ route('tutores.destroy',$t->id) }}" onsubmit="return confirm('Excluir este tutor?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Excluir</button></form></td></tr>@empty<tr><td colspan="5" class="text-center text-secondary">Nenhum tutor cadastrado.</td></tr>@endforelse
</tbody></table></div></div>
@endsection
