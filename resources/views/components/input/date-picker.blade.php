<div wire:ignore class="form-group">
    <x-input.label for="{{$label}}">{{ucfirst($label)}}</x-input.label>
    <input {{ $attributes->merge(['class' => 'form-control']) }}>
    @if (isset($error))
    {{$error}}
    @else
    @error(strtolower(substr($label, 0, strrpos($label, ' ') ? strrpos($label, ' ') : strlen($label))))
    <span class="text-danger">{{$message}}</span>
    @enderror
    @endif
</div>

@push('css')
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
@endpush

@push('js')
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
@endpush

@push('script')
<script>
    $('#month').datepicker({
		autoclose: true,
		format : 'mm',
		viewMode : 'months',
		minViewMode : 'months',
	});
    $('#month').on('change', function(){
        @this.month = $(this).val()
    });

	$('#year').datepicker({
		autoclose: true,
		format : 'yyyy',
		viewMode : 'years',
		minViewMode : 'years',
	});
    $('#year').on('change', function(){
        @this.year = $(this).val()
    });

    $("#tanggal").datepicker({
        autoclose: true,
    });

    $('#tanggal').on('change', function(){
        @this.tanggal = $(this).val()
    });
</script>
@endpush
