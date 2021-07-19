@if(session('success'))
    <div class="alert alert-success mt-1">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-1">
        {{session('error')}}
    </div>
@endif