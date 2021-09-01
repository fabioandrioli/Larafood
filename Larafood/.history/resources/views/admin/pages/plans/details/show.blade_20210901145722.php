@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Detalhes do Plano<a href="{{route('details.plan.create',$plan->url)}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do plano: <b>{{$plan->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome do plano: </strong>{{$plan->name}}
                </li>
                <li>
                    <strong>Nome do detalhe: </strong>{{$detail->name}}
                </li>
            </ul>
            <form action="{{route('plans.destroy',$plan->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O DETALHE {{$detail->name}}</button>
            </form>
        </div>
    </div>
@stop

@stop
