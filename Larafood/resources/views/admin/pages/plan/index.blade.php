@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #filtros
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($plans as $plan)
                    <tr>
                        <td>{{$plan->name}}</td>
                        <td>{{$plan->price}}</td>
                        <td style="width=50px">
                            <a href="#" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum plano encontrado.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
