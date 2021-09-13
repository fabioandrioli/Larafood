@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Profiles <a href="{{route('roles.create')}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('roles.search')}}">
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
                        <th>Descrição</th>
                        <th width="250">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($roles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>{{$role->description}}</td>
                    
                        <td style="width=10px">
                            <a href="{{route('roles.edit',$role->id)}}" class="btn btn-info">Editar</a>
                            <a href="{{route('roles.show',$role->id)}}" class="btn btn-warning">Ver</a>
                            <a href="{{route('roles.permissions',$role->id)}}" class="btn btn-primary"><i class="fa fa-lock" aria-hidden="true"></i></a>   
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum papel encontrado.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $roles->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $roles->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
