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
<script>
    // Livewire.emit('destroy')

    document.addEventListener('livewire:load', function () {
        @this.on('destroy', id => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    @this.call('destroy', id)
                    Swal.fire(
                        'Dihapus!',
                        'Data berhasil dihapus',
                        'success'
                    )
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'Data Tidak dihapus',
                        'error'
                    )
                }
            })
        })
    })
</script>
@endpush
