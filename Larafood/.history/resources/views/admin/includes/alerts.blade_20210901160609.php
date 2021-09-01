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

@if(session('error'))
    <div class="alert alert-warning">
        {{session('error')}}
    </div>
@endif


<script>

    function messageTimeOut(){
        if(document.querySelector(".alert")){
            let divClassMessageAlert = document.querySelector(".alert");
            setTimeout(function() { 
                divClassMessageAlert.style.display = "none"
            }, 7000);
        }
    }

    messageTimeOut();
</script>