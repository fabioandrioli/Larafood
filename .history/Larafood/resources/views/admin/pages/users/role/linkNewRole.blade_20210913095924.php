@extends('adminlte::page')

@section('title', 'Cargos do Usuário')

@section('content_header')
    <h1>Cargos disponiveis para o Usuário: {{$user->name}}  </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('users.linkNewRole',$user->id)}}">
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
                    <form action="{{route('users.linkNewRoleStore',$user->id)}}" method="POST">
                        @csrf
                        @forelse($roles as $role)
                        <tr>
                            <td>
                                <input type="checkbox" name="roles[]" value="{{$role->id}}"/>
                            
                            </td>
                            <td>
                                {{$role->name}}
                            </td>
                        </tr>
                        @empty
                        <tr >
                            <td>*</td>
                            <td> <p>Nenhuma permissão encontrada.</p></td>
                        </tr>
                        @endforelse
                        <tr>
                        
                            <td colspan="500">
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                 
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
