@extends('adminlte::page')

@section('title', 'Permissões do perfil')

@section('content_header')
    <h1>Vincular novo Produto na Categoria: {{$category->name}} <a href="{{route('categories.linkNewProduct',$category->url)}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('categories.search')}}">
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

                    @forelse($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                    
                        <td style="width=10px">
                           
                        </td>
                    </tr>
                    @empty
                    <tr >
                        <td> <p>Nenhum produto encontrado.</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $products->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $products->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
