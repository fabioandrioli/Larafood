@extends('adminlte::page')


@section('title', "Detalhes do Profile {$role->name}")

@section('content_header')
    <h1>Detalhes do perfil: <b>{{$role->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$role->name}}
                </li>
            
                <li>
                    <strong>Descrição: </strong>{{$role->description}}
                </li>
            </ul>
            <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O PERFIL {{$role->name}}</button>
            </form>
        </div>
    </div>
@stop
