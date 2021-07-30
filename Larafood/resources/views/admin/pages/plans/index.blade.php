@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('plans.search')}}">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($plans as $plan)
                    <tr>
                        <td>{{$plan->name}}</td>
                        <td>R$ {{number_format($plan->price, 2, ',','.')}}</td>
                        <td style="width=50px">
                            <a href="{{route('plans.show',$plan->url)}}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum plano encontrado.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $plans->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@stop
