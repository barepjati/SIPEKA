<div wire:ignore class="form-group">
    <x-input.label for="{{$label}}">{{ucfirst($label)}}</x-input.label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-clock"></i></span>
        </div>
        <input {{ $attributes->merge(['class' => 'form-control', 'type'=>'text']) }}>
    </div>

    @if (isset($error))
    {{$error}}
    @else
    @error(strtolower(substr($label, 0, strrpos($label, ' ') ? strrpos($label, ' ') : strlen($label))))
    <span class="text-danger">{{$message}}</span>
    @enderror
    @endif
</div>

@push('css')
{{-- <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
--}}
<link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
@endpush

@push('js')
{{-- <script src="{{ asset('plugins/moment/moment.min.js') }}"></script> --}}
{{-- <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
@endpush

@push('script')
<script>
    $("#waktu").timepicker({
        autoclose: true,
        showMeridian:false
    }).on('change', function (e) {
        @this.set('waktu', e.target.value);
    });
</script>
@endpush
