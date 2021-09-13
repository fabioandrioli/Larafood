@extends('adminlte::page')

@section('title', 'productos')

@section('content_header')
    <h1>productos <a href="{{route('products.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do producto {$product->name}")

@section('content_header')
    <h1>Detalhes do produto: <b>{{$product->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$product->name}}
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
            <form action="{{route('products.destroy',$product->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O productO {{$product->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
