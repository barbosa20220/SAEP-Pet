@extends('layouts.app')
@section('title','Novo pet')
@section('content')
<div class="card p-4"><h1 class="page-title">Cadastrar pet</h1>
<form method="POST" action="{{ route('pets.store') }}">@csrf @include('pets.form')
<button class="btn btn-primary">Salvar pet</button> <a class="btn btn-outline-secondary" href="{{ route('pets.index') }}">Cancelar</a></form></div>
@endsection
