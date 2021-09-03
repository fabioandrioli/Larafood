@extends('adminlte::page')

@section('title', 'Perfis da Permissão {$permission->name}')

@section('content_header')
    <h1>Adicionar novo perfil <a href="{{route('permissions.create')}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
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

                    @forelse($profiles as $profile)
                    <tr>
                        <td>{{$profile->name}}</td>
                        <td>{{$profile->description}}</td>
                    
                        <td style="width=10px">
                            <a href="{{route('permissions.edit',$permission->id)}}" class="btn btn-info">Desvincular</a>
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
                {!! $profiles->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $profiles->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
