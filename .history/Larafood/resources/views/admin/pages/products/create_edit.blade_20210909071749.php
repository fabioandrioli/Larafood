@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categoria')

@section('content_header')
    @if(isset($product))
        <h1>Editar Produtos: {{$product->name}}</h1>
    @else
        <h1>Cadastrar Novo Produto</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            @if(isset($product))
            <form action="{{route('categories.update',$product->id)}}" class="form" method="POST">
                @method('put')
            @else
             <form action="{{route('categories.store')}}" class="form" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" value="{{$product->name ?? old('name')}}" class="form-control" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="url" value="{{$product->url ?? old('url')}}" class="form-control" placeholder="Url:">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="description" value="{{$product->description ?? old('description') }}" class="form-control" placeholder="Descrição:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@stop
