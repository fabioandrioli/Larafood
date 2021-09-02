@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Permissão <a href="{{route('permissions.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do permission {$permission->name}")

@section('content_header')
    <h1>Detalhes da Permissão: <b>{{$permission->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            @forelse()
                <ul>
                    <li>
                        <strong>Nome: </strong>{{$permission->name}}
                    </li>
                
                    <li>
                        <strong>Descrição: </strong>{{$permission->description}}
                    </li>
                </ul>
                <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">DELETAR O PERFIL {{$permission->name}}</button>
                </form>
            @empty
            <li>
                <strong>Nenhum perfil encontrado nesta permissão</strong>
            </li>
        </div>
    </div>
@stop

@stop
