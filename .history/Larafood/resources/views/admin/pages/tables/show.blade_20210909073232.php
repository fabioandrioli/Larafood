@extends('adminlte::page')

@section('title', 'Mesa')

@section('content_header')
    <h1>Mesas <a href="{{route('tables.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do Produto {$table->name}")

@section('content_header')
    <h1>Detalhes do produto: <b>{{$table->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Descrição: </strong>{{$table->description}}
                </li>
                <li>
                    <strong>Identificação: </strong>{{$table->identify}}
                </li>
                <li>
                    <strong>Preço: </strong>R$ {{number_format($table->price, 2, ',','.')}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$table->description}}
                </li>
            </ul>
            <form action="{{route('tables.destroy',$table->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O tableO {{$table->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
