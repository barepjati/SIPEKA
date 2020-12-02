<div class="form-group">
    {{ isset($label) ? $label : null }}
    <input {{ $attributes->merge(['class' => 'form-control']) }}>
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
</script>
@endpush
