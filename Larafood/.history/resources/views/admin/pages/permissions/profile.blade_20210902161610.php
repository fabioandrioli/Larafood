@extends('adminlte::page')


@section('title', "Perfis da Permissão")
@stop

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
