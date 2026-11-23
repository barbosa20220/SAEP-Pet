@extends('layouts.app')
@section('title','Editar pet')
@section('content')
<div class="card p-4"><h1 class="page-title">Editar pet</h1>
<form method="POST" action="{{ route('pets.update',$pet->id) }}">@csrf @method('PUT') @include('pets.form')
<button class="btn btn-primary">Salvar alterações</button> <a class="btn btn-outline-secondary" href="{{ route('pets.index') }}">Cancelar</a></form></div>
@endsection
