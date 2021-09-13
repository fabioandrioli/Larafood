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
            <form action="{{route('products.update',$product->id)}}" class="form" method="POST" enctype="multipart/form-data">
                @method('put')
            @else
             <form action="{{route('products.store')}}" class="form" enctype="multipart/form-data" method="POST" >
            @endif
                @csrf
                <div class="form-group">
                    <label>Titulo:</label>
                    <input type="text" name="title" value="{{$product->title ?? old('title')}}" class="form-control" placeholder="Titulo:">
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
                    <label for="exampleFormControlFile1">Imagem do produto</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@stop
