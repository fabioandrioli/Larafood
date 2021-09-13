@extends('adminlte::page')

@section('title', 'Permissões do papel')

@section('content_header')
    <h1>Vincular nova Permissão no Papel: {{$role->name}} <a href="{{route('roles.linkNewPermission',$role->id)}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
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

                    @forelse($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->description}}</td>
                    
                        <td style="width=10px">
                            <a href="{{route('roles.permissions.unbindPermission',[$role->id,$permission->id])}}" class="btn btn-danger">Desvincular</a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhuma permissão encontrada.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $permissions->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $permissions->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
