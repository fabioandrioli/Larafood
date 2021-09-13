@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários <a href="{{route('users.create')}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
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
                        <th>email</th>
                        <th width="250">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td style="width=10px">
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">Editar</a>
                            <a href="{{route('users.show',$user->id)}}" class="btn btn-warning">Ver</a>
                            <a href="{{route('users.roles',$user->id)}}" class="btn btn-primary"><i class="fa fa-key" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum usero encontrado.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $users->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $users->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
