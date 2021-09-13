@extends('adminlte::page')

@section('title', 'Cargo do papel')

@section('content_header')
    <h1>Vincular novo Cargo no Usuário: {{$user->name}} <a href="{{route('users.linkNewRole',$user->id)}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('users.search')}}">
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
                            <a href="{{route('users.roles.unbindRole',[$user->id,$role->id])}}" class="btn btn-danger">Desvincular</a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhuma cargo encontrada.</p></td>
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
