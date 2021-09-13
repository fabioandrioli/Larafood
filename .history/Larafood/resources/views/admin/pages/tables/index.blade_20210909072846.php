@extends('adminlte::page')

@section('title', 'Table')

@section('content_header')
    <h1>Table <a href="{{route('tables.create')}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('tables.search')}}">
                @csrf
                <input type="text" name="filter" value="{{$filters['filter'] ?? ''}}" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-dark"><i class="fa fa-glass"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Identificação</th>
                        <th width="250">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($tables as $table)
                    <tr>
                        <td>{{$table->name}}</td>
                        <td>{{$table->identify}}</td>
                        <td style="width=10px">
                            <a href="{{route('tables.edit',$table->url)}}" class="btn btn-info">Editar</a>
                            <a href="{{route('tables.show',$table->url)}}" class="btn btn-warning">Ver</a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum produto encontrado.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $tables->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $tables->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
