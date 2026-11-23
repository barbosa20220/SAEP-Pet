@extends('layouts.app')
@section('title','Início - SAEP Pet')
@section('content')
<h1 class="page-title">Bem-vindo(a), {{ session('usuario_nome') }}!</h1>
<p class="text-secondary">Sistema de gerenciamento de tutores, pets e agendamentos.</p>
<div class="row g-3 mt-2">
@foreach([['Tutores','Cadastre e consulte os responsáveis pelos animais.','tutores.index'],['Pets','Gerencie os dados dos animais.','pets.index'],['Agendamentos','Organize os serviços e acompanhe os status.','agendamentos.index']] as $item)
<div class="col-md-4"><div class="card p-4 h-100"><h3>{{ $item[0] }}</h3><p class="text-secondary">{{ $item[1] }}</p><a class="btn btn-primary mt-auto" href="{{ route($item[2]) }}">Acessar</a></div></div>
@endforeach
</div>
@endsection
