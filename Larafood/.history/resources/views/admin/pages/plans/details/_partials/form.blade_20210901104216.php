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

        </form>