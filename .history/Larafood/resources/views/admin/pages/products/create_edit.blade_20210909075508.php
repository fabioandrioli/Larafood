@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')
    @if(isset($product))
        <h1>Editar Produto: {{$product->name}}</h1>
    @else
        <h1>Cadastrar Novo Produto</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            @if(isset($product))
            <form action="{{route('products.update',$product->id)}}" class="form" method="POST">
                @method('put')
            @else
             <form action="{{route('products.store')}}" class="form" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label>Titulo:</label>
                    <input type="text" name="title" value="{{$product->name ?? old('name')}}" class="form-control" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="price" value="{{$product->price ?? old('price')}}" class="form-control" placeholder="Preço:">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="description" name="description" value="{{$product->description ?? old('description') }}" class="form-control" placeholder="Descrição:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@stop
