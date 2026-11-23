@extends('layouts.app')
@section('title','Pets')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h1 class="page-title">Pets</h1><a class="btn btn-primary" href="{{ route('pets.create') }}">+ Novo pet</a></div>
<div class="card p-3"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Pet</th><th>Espécie</th><th>Raça</th><th>Porte</th><th>Tutor</th><th>Ações</th></tr></thead><tbody>
@forelse($pets as $p)<tr><td>{{ $p->nome }}</td><td>{{ $p->especie }}</td><td>{{ $p->raca ?: '—' }}</td><td>{{ $p->porte ?: '—' }}</td><td>{{ $p->tutor }}</td><td class="d-flex gap-2"><a class="btn btn-sm btn-outline-primary" href="{{ route('pets.edit',$p->id) }}">Editar</a><form method="POST" action="{{ route('pets.destroy',$p->id) }}" onsubmit="return confirm('Excluir este pet?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Excluir</button></form></td></tr>@empty<tr><td colspan="6" class="text-center text-secondary">Nenhum pet cadastrado.</td></tr>@endforelse
</tbody></table></div></div>
@endsection
