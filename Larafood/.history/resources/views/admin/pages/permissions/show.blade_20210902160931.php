@extends('adminlte::page')


@section('content_header')
    <h1>Detalhes da Permissão: <b>{{$permission->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
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
                <button type="submit" class="btn btn-danger">DELETAR A PERMISSÃO {{$permission->name}}</button>
            </form>
        </div>
    </div>
@stop
