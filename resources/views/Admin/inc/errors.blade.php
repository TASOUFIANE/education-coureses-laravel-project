@if($errors->any())
    <div class="alert alert-danger py-1">
       
            @foreach($errors->all() as $error)
             <span>   {{ $error }}</span><br>
            @endforeach
        
    </div>
@endif