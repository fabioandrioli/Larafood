@extends('adminlte::page')

@section('title', 'Detalhes do Plano {$plan->name}')

@section('content_header')
    <h1>Detalhes do Plano {{$plan->name}} <a href="{{route('details.create')}}" class="btn btn-dark">Adicionar detalhe <i class="fa fa-plus-circle"></i></a> </h1>
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
                        <td>{{$detail->name}}</td>
                        <td style="width=50px">
                            <a href="{{route('details.edit',$plan->url)}}" class="btn btn-warning">EDITAR</a>
                            <a href="{{route('details.show',$plan->url)}}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum detalhe encontrado.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $details->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $details->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
