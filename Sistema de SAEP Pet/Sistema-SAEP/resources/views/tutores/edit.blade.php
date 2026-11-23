@extends('layouts.app')
@section('title','Editar tutor')
@section('content')
<div class="card p-4"><h1 class="page-title">Editar tutor</h1>
<form method="POST" action="{{ route('tutores.update',$tutor->id) }}">@csrf @method('PUT')
@include('tutores.form')
<button class="btn btn-primary">Salvar alterações</button> <a class="btn btn-outline-secondary" href="{{ route('tutores.index') }}">Cancelar</a>
</form></div>
@endsection
