<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        @if ($subtitle == null)
        <li class="breadcrumb-item active">{{$title}}</li>
        @else
        <li class="breadcrumb-item">{{$title}}</li>
        <li class="breadcrumb-item active">{{$subtitle}}</li>
        @endif
        {{-- <li class="breadcrumb-item active">fasasf</li> --}}
    </ol>
</div>
