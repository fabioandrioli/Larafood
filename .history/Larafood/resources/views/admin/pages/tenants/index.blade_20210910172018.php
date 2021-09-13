@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Empresas</h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('tenants.search')}}">
                @csrf
                <input type="text" name="filter" value="{{$filters['filter'] ?? ''}}" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-dark"><i class="fa fa-glass"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Titulo</th>
                        <th>Preço</th>
                        <th width="250">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($tenants as $tenant)
                    <tr>
                        <td><img width="200px" height="200px" src="{{ url("storage/{$tenant->image}") }}" alt="{{$tenant->title}}" class="img-thumbnail"></td>
                        <td>{{$tenant->title}}</td>
                        <td>R$ {{$tenant->plan->name}}</td>
                        <td style="width=10px">
                            <a href="{{route('tenants.show',$tenant->id)}}" class="btn btn-warning">Ver</a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum empresa encontrado.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $tenants->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $tenants->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
