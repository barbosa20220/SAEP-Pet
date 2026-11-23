@extends('layouts.app')
@section('title','Editar agendamento')
@section('content')
<div class="card p-4"><h1 class="page-title">Editar agendamento</h1>
<form method="POST" action="{{ route('agendamentos.update',$agendamento->id) }}">@csrf @method('PUT') @include('agendamentos.form', ['novo'=>false])
<button class="btn btn-primary">Salvar alterações</button> <a class="btn btn-outline-secondary" href="{{ route('agendamentos.index') }}">Cancelar</a></form></div>
@endsection
