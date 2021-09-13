@extends('adminlte::page')

@section('title', 'useros')

@section('content_header')
    <h1>useros <a href="{{route('users.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do usero {$user->name}")

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
                    <strong>Url: </strong>{{$user->url}}
                </li>
                <li>
                    <strong>Preço: </strong>R$ {{number_format($user->price, 2, ',','.')}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$user->description}}
                </li>
            </ul>
            <form action="{{route('users.destroy',$user->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O userO {{$user->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
