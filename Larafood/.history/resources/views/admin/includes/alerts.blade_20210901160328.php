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
        if(document.querySelector(".alert.alert-success") || document.querySelector(".alert.alert-warning")){
            let divClassMessageAlertSuccess = document.querySelector(".alert.alert-success");
            setTimeout(function() { 
                divClassMessageAlertSuccess.style.display = "none"
            }, 5000);
        }
    }

    messageTimeOut();
</script>