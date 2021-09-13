@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias <a href="{{route('categories.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes da categoria {$category->name}")

@section('content_header')
    <h1>Detalhes da Categoria: <b>{{$category->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$category->name}}
                </li>
                <li>
                    <strong>Url: </strong>{{$category->url}}
                </li>
                <li>
                    <strong>Preço: </strong>R$ {{number_format($category->price, 2, ',','.')}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$category->description}}
                </li>
            </ul>
            <form action="{{route('categories.destroy',$category->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR A CATEGORIA {{$category->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
