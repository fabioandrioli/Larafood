@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
    <h1>Usuário <a href="{{route('users.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do usuário {$user->name}")

@section('content_header')
    <h1>Detalhes do usuário: <b>{{$user->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$user->name}}
                </li>
                <li>
                    <strong>Email: </strong>{{$user->email}}
                </li>
            </ul>
            <form action="{{route('users.destroy',$user->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O USUÁRIO {{$user->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
