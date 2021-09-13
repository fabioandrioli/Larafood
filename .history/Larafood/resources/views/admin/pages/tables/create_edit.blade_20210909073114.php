@extends('adminlte::page')

@section('title', 'Cadastrar Nova Mesa')

@section('content_header')
    @if(isset($table))
        <h1>Editar Mesa: {{$table->name}}</h1>
    @else
        <h1>Cadastrar Nova Mesa</h1>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            @if(isset($table))
            <form action="{{route('tables.update',$table->id)}}" class="form" method="POST">
                @method('put')
            @else
             <form action="{{route('tables.store')}}" class="form" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" value="{{$table->name ?? old('name')}}" class="form-control" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="price" value="{{$table->price ?? old('price')}}" class="form-control" placeholder="Preço:">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="description" name="description" value="{{$table->description ?? old('description') }}" class="form-control" placeholder="Descrição:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@stop
