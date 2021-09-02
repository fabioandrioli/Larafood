@extends('adminlte::page')


@section('title', "Detalhes do Profile {$profile->name}")

@section('content_header')
    <h1>Detalhes do perfil: <b>{{$profile->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            @forelse ($profile->permissions as $permission)
                <ul>
                    <li>
                        <strong>Nome: </strong>{{$permission->name}}
                    </li>
                
                    <li>
                        <strong>Descrição: </strong>{{$permission->description}}
                    </li>
                </ul>
                @empty
                <ul>
                    <li>
                        <strong>Nenhuma permissão econtrada </strong>
                    </li>
                </ul>
                @endforelse
        </div>
    </div>
@stop
