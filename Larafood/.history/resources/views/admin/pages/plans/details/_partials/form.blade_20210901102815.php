@include('admin.includes.alerts')
    @if(isset($plan))
        <form action="{{route('details.plan.update',$plan->url)}}" class="form" method="POST">
        @method('put')
    @else
        <form action="{{route('details.plan.store')}}" class="form" method="POST">
    @endif
            @csrf
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" value="{{$plan->name ?? old('name')}}" class="form-control" placeholder="Nome:">
            </div>
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="price" value="{{$plan->price ?? old('price')}}" class="form-control" placeholder="Preço:">
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <input type="description" name="description" value="{{$plan->description ?? old('description') }}" class="form-control" placeholder="Descrição:">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>

        </form>