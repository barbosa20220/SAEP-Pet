@extends('layouts.app')
@section('title','Novo tutor')
@section('content')
<div class="card p-4"><h1 class="page-title">Cadastrar tutor</h1>
<form method="POST" action="{{ route('tutores.store') }}">@csrf
@include('tutores.form', ['tutor'=>null])
<button class="btn btn-primary">Salvar tutor</button> <a class="btn btn-outline-secondary" href="{{ route('tutores.index') }}">Cancelar</a>
</form></div>
@endsection
