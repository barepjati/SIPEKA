<div wire:ignore class="form-group">
    <x-input.label for="{{$label}}">{{ucfirst($label)}}</x-input.label>
    <select {{ $attributes->merge(['class' => 'form-control select2', 'data-placeholder' => 'Pilih Data']) }}>
        <option></option>
        {{$opt}}
    </select>
</div>

@push('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endpush

@push('style')
<style>
    .select2-selection__rendered {
        line-height: 30px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 40px !important;
    }

    .select2 {
        width: 100% !important;
    }
</style>
@endpush

@push('js')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
@endpush

@push('script')
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.select2').on('select2:select', function () {
            // @this.data = $(this).val()

        });
        $('.select2').on('change', function(){
            @this.data = $(this).val()
        });
    });

</script>
@endpush
