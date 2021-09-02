@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Permissão <a href="{{route('permissions.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Perfis da Permissão {$permission->name}")

@section('content_header')
    <h1>Detalhes do perfil: <b>{{$permission->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$profile->name}}
                </li>
            
                <li>
                    <strong>Descrição: </strong>{{$profile->description}}
                </li>
            </ul>
            <form action="{{route('profiles.destroy',$profile->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O PERFIL {{$profile->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
