@extends('adminlte::page')

@section('title', 'Detalhes do Plano {$plan->name}')

@section('content_header')
    <h1>Detalhes do Plano {{$plan->name}} <a href="{{route('plans.create')}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
@stop

@section('content')
    <div class="card">
    
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="150">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($details as $detail)
                    <tr>
                        <td>{{$plan->name}}</td>
                        <td>R$ {{number_format($plan->price, 2, ',','.')}}</td>
                        <td style="width=50px">
                            <a href="{{route('plans.edit',$plan->url)}}" class="btn btn-warning">EDITAR</a>
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
            @if(isset($filters))
                {!! $plans->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $plans->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
