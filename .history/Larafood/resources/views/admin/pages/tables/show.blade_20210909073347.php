@extends('adminlte::page')

@section('title', 'Mesa')

@section('content_header')
    <h1>Mesas <a href="{{route('tables.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes da Mesa {$table->name}")

@section('content_header')
    <h1>Detalhes da Mesa: <b>{{$table->name}}</b></h1>
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
                    <strong>Uuid: </strong>{{$table->uuid}}
                </li>
               
            </ul>
            <form action="{{route('tables.destroy',$table->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR A MESA {{$table->description}}</button>
            </form>
        </div>
    </div>
@stop

@stop
