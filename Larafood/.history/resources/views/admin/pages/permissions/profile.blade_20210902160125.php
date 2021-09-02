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
            @forelse($profiles as $profile)
                <ul>
                    <li>
                        <strong>Nome: </strong>{{$profile->name}}
                    </li>
                
                    <li>
                        <strong>Descrição: </strong>{{$profile->description}}
                    </li>
                </ul>
               
            @empty
            <ul>
                <li>
                    <strong>Nenhum perfil encontrado nesta permissão</strong>
                </li>
            </ul>
            @endforelse
        </div>
    </div>
@stop
