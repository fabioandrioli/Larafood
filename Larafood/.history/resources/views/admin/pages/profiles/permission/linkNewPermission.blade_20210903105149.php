@extends('adminlte::page')

@section('title', 'Permissões do perfil')

@section('content_header')
    <h1>Permissões disponiveis para o Perfil: {{$profile->name}}  </h1>
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
                        <th width="50">#</th>
                        <th>nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="POST">
                        @csrf
                        @forelse($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}"/>
                            
                            </td>
                            <td>
                                {{$permission->name}}
                            </td>
                        </tr>
                        @empty
                        <tr >
                            <td> <p>Nenhuma permissão encontrada.</p></td>
                        </tr>
                        @endforelse
                        <tr>
                            <td colspan="500">
                                <button type="submit" class="btn btn-dark">
                            </td>
                        </tr>
                    </form>
                 
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
