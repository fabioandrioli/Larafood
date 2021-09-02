@extends('adminlte::page')


@section('title', "Detalhes do Profile {$profile->name}")

@section('content_header')
    <h1>Detalhes do perfil: <b>{{$profile->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            @forelse ($permisison->profiles as $profile)
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
                        <strong>Nenhuma permissão econtrada </strong>
                    </li>
                </ul>
                @endforelse
        </div>
    </div>
@stop
