{{-- <div class="row"> --}}
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
        </div>
        <div class="card-body">
            {{ $button }}
            <table id="dt" class="table table-bordered table-striped">
                {{ $slot }}
            </table>
        </div>
    </div>
</div>
{{-- </div> --}}

@push('script')
<script>
    $(document).ready(function() {
        $('#dt').DataTable({});
    });
</script>
@endpush

@push('js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
