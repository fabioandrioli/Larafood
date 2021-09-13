@extends('adminlte::page')

@section('title', 'Permissão')

@section('content_header')
    <h1>Permissão <a href="{{route('permissions.create')}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('permissions.search')}}">
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
                            <a href="{{route('permissions.edit',$permission->id)}}" class="btn btn-info">Editar</a>
                            <a href="{{route('permissions.show',$permission->id)}}" class="btn btn-warning">Ver</a>
                            <a href="{{route('permissions.profiles',$permission->id)}}" class="btn btn-primary"><i class="fa fa-address-book-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum perfil encontrado.</p></td>
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
