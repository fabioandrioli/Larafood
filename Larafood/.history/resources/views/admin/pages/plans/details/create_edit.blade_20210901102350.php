@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    @if(isset($plan))
        <h1>Editar Plano: {{$plan->name}}</h1>
    @else
        <h1>Cadastrar Novo Plano</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            
        </div>
    </div>
@stop
