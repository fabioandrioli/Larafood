@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

<script>
    let divClassMessageAlertSuccess = document.querySelector(".alert.alert-success");
    setTimeout(function() { 
        divClassMessageAlertSuccess.style.display = "none"
     }, 2000);

</script>