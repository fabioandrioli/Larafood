@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Empresa <a href="{{route('tenants.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do Produto {$tenant->name}")

@section('content_header')
    <h1>Detalhes do empresa: <b>{{$tenant->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <img width="200px" height="200px" src="{{$tenant->image}}" alt="{{$tenant->title}}" class="img-thumbnail">
                </li>
                <li>
                    <strong>Titulo: </strong>{{$tenant->name}}
                </li>
                <li>
                    <strong>Url: </strong>{{$tenant->url}}
                </li>
                <li>
                    <strong>Uuid: </strong>R$ {{$tenant->uuid}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$tenant->description}}
                </li>
            </ul>
            <form action="{{route('tenants.destroy',$tenant->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O PRODUTO {{$tenant->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
