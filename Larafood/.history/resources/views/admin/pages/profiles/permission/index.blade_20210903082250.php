@extends('adminlte::page')

@section('title', 'Permissões do perfil {$profile->name}')

@section('content_header')
    <h1>Adicionar nova Permissão <a href="{{route('profiles.create')}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('profiles.search')}}">
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

                    @forelse($profile->permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->description}}</td>
                    
                        <td style="width=10px">
                            <a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-info">Desvincular</a>
                            <a href="{{route('profiles.show',$profile->id)}}" class="btn btn-warning">Ver</a>
                            <a href="{{route('profiles.permissions',$profile->id)}}" class="btn btn-primary"><i class="fa fa-lock" aria-hidden="true"></i></a>
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
