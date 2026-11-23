@extends('layouts.app')
@section('title','Agendamentos')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h1 class="page-title">Agendamentos</h1><a class="btn btn-primary" href="{{ route('agendamentos.create') }}">+ Novo agendamento</a></div>
<div class="card p-3"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Data</th><th>Horário</th><th>Pet</th><th>Tutor</th><th>Serviço</th><th>Status</th><th>Ações</th></tr></thead><tbody>
@forelse($agendamentos as $a)<tr><td>{{ \Carbon\Carbon::parse($a->data_agendamento)->format('d/m/Y') }}</td><td>{{ substr($a->horario,0,5) }}</td><td>{{ $a->pet }}</td><td>{{ $a->tutor }}</td><td>{{ $a->servico }}</td><td>{{ $a->status }}</td><td class="d-flex gap-2"><a class="btn btn-sm btn-outline-primary" href="{{ route('agendamentos.edit',$a->id) }}">Editar</a><form method="POST" action="{{ route('agendamentos.destroy',$a->id) }}" onsubmit="return confirm('Excluir este agendamento?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Excluir</button></form></td></tr>@empty<tr><td colspan="7" class="text-center text-secondary">Nenhum agendamento cadastrado.</td></tr>@endforelse
</tbody></table></div></div>
@endsection
