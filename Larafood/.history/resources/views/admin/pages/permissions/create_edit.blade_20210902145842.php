@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    @if(isset($permission))
        <h1>Editar Perfil: {{$permission->name}}</h1>
    @else
        <h1>Cadastrar Nova Permissãol</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            @if(isset($permission))
            <form action="{{route('permissions.update',$permission->id)}}" class="form" method="POST">
                @method('put')
            @else
             <form action="{{route('permissions.store')}}" class="form" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" value="{{$permission->name ?? old('name')}}" class="form-control" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="description" name="description" value="{{$permission->description ?? old('description') }}" class="form-control" placeholder="Descrição:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@stop
