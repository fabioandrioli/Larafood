@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categoria')

@section('content_header')
    @if(isset($category))
        <h1>Editar Categoria: {{$category->name}}</h1>
    @else
        <h1>Cadastrar Nova Categoria</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            @if(isset($category))
            <form action="{{route('categories.update',$category->id)}}" class="form" method="POST">
                @method('put')
            @else
             <form action="{{route('categories.store')}}" class="form" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" value="{{$category->name ?? old('name')}}" class="form-control" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="url" value="{{$category->url ?? old('url')}}" class="form-control" placeholder="Preço:">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="description" value="{{$category->description ?? old('description') }}" class="form-control" placeholder="Descrição:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@stop
