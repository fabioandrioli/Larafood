@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos <a href="{{route('products.create')}}" class="btn btn-dark"><i class="fa fa-plus-circle"></i></a> </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('products.search')}}">
                @csrf
                <input type="text" name="filter" value="{{$filters['filter'] ?? ''}}" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-dark"><i class="fa fa-glass"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Titulo</th>
                        <th>Preço</th>
                        <th width="250">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($products as $product)
                    <tr>
                        <td><img width="200px" height="200px" src="{{ url("storage/{$product->image}") }}" alt="{{$product->title}}" class="img-thumbnail"></td>
                        <td>{{$product->title}}</td>
                        <td>R$ {{number_format($product->price, 2, ',','.')}}</td>
                        <td style="width=10px">
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-info">Editar</a>
                            <a href="{{route('products.show',$product->id)}}" class="btn btn-warning">Ver</a>
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
