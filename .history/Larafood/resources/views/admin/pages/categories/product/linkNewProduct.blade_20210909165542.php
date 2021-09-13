@extends('adminlte::page')

@section('title', 'Produtos da categoria')

@section('content_header')
    <h1>Produtos disponiveis para a Categoria: {{$category->name}}  </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form class="form form-inline" method="POST" action="{{route('categories.linkNewProduct',$category->url)}}">
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
                    <form action="{{route('categories.linkNewProductStore',$category->id)}}" method="POST">
                        @csrf
                        @forelse($products as $product)
                        <tr>
                            <td>
                                <input type="checkbox" name="products[]" value="{{$product->id}}"/>
                            
                            </td>
                            <td>
                                {{$product->title}}
                            </td>
                        </tr>
                        @empty
                        <tr >
                            <td>*</td>
                            <td> <p>Nenhum produto encontrado.</p></td>
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
                {!! $products->appends($filters)->links("pagination::bootstrap-4") !!}
             @else
                {!! $products->links("pagination::bootstrap-4") !!}
            @endif

        </div>
    </div>
@stop
