@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Perfil <a href="{{route('plans.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do perfil: <b>{{$profile->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$plan->name}}
                </li>
                <li>
                    <strong>Url: </strong>{{$plan->url}}
                </li>
                <li>
                    <strong>Preço: </strong>R$ {{number_format($plan->price, 2, ',','.')}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$plan->description}}
                </li>
            </ul>
            <form action="{{route('plans.destroy',$plan->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O PLANO {{$plan->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
