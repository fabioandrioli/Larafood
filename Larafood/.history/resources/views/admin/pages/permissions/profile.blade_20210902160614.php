@extends('adminlte::page')

@section('content_header')
    <h1>Permissão <a href="{{route('permissions.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop


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
                    {{-- <strong>Nome: </strong>{{$profile->name}} --}}
                </li>
            
                <li>
                    {{-- <strong>Descrição: </strong>{{$profile->description}} --}}
                </li>
            </ul>
            
        </div>
    </div>
@stop
