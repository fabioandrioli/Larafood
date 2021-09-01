@extends('adminlte::page')

@section('title', 'Cadastrar Novo Detalhe')

@section('content_header')
    @if(isset($detail))
        <h1>Editar detalhe do Plano: {{$plan->name}}</h1>
    @else
        <h1>Cadastrar Novo Detalhe</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include("admin.pages.plans.details._partials.form")
        </div>
    </div>
@stop
