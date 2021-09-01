@include('admin.includes.alerts')
    @if(isset($detail))
        <form action="{{route('details.plan.update',[$plan->url,$detail->id])}}" class="form" method="POST">
        @method('put')
    @else
        <form action="{{route('details.plan.store',$plan->url)}}" class="form" method="POST">
    @endif
            @csrf
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" value="{{$detail->name ?? old('name')}}" class="form-control" placeholder="Nome:">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
        </form>