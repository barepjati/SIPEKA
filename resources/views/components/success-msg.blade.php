@if(session('message'))
<div class="col-md-12">
    <div class="alert alert-success">
        {{session('message')}}
    </div>
</div>
@endif
