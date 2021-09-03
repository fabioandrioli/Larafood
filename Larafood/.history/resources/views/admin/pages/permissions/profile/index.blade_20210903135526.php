@extends('adminlte::page')

@section('title', 'Perfis da Permissão')

@section('content')
    <div class="card">
        @include('admin.includes.alerts')

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($profiles as $profile)
                    <tr>
                        <td>{{$profile->name}}</td>
                        <td>{{$profile->description}}</td>

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
