@extends('layouts.app')
@section('title','Novo agendamento')
@section('content')
<div class="card p-4"><h1 class="page-title">Novo agendamento</h1>
<form method="POST" action="{{ route('agendamentos.store') }}">@csrf @include('agendamentos.form', ['novo'=>true])
<button class="btn btn-primary">Salvar agendamento</button> <a class="btn btn-outline-secondary" href="{{ route('agendamentos.index') }}">Cancelar</a></form></div>
@endsection
