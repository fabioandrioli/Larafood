@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
    @if(isset($profile))
        <h1>Editar Perfil: {{$profile->name}}</h1>
    @else
        <h1>Cadastrar Novo Perfil</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            @if(isset($profile))
            <form action="{{route('profiles.update',$profile->id)}}" class="form" method="POST">
                @method('put')
            @else
             <form action="{{route('profiles.store')}}" class="form" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" value="{{$profile->name ?? old('name')}}" class="form-control" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="description" name="description" value="{{$profile->description ?? old('description') }}" class="form-control" placeholder="Descrição:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@stop
