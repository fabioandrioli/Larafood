@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    @if(isset($user))
        <h1>Editar Usuário: {{$user->name}}</h1>
    @else
        <h1>Cadastrar Novo Usuário</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            @if(isset($user))
            <form action="{{route('users.update',$user->id)}}" class="form" method="POST">
                @method('put')
            @else
             <form action="{{route('users.store')}}" class="form" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" value="{{$user->name ?? old('name')}}" class="form-control" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="price" value="{{$user->price ?? old('price')}}" class="form-control" placeholder="Email:">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="password" name="password" value="{{$user->passowrd ?? old('') }}" class="form-control" placeholder="Password:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@stop
