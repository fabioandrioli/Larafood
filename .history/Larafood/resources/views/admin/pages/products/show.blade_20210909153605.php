@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>productos <a href="{{route('products.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do Produto {$product->name}")

@section('content_header')
    <h1>Detalhes do produto: <b>{{$product->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <img with="200px" height="200px" src="{{$product->image}}" alt="{{$product->title}}" class="img-thumbnail">
                </li>
                <li>
                    <strong>Titulo: </strong>{{$product->title}}
                </li>
                <li>
                    <strong>Url: </strong>{{$product->url}}
                </li>
                <li>
                    <strong>Preço: </strong>R$ {{number_format($product->price, 2, ',','.')}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$product->description}}
                </li>
            </ul>
            <form action="{{route('products.destroy',$product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O PRODUTO {{$product->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
