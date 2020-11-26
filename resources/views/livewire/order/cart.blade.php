<x-div class="row">
    <div class="col-6 col-md-6 col-sm-12">
        <x-card>
            <x-slot name="header">Daftar Menu</x-slot>
            <input type="text" class="form-control" placeholder="Search" wire:model="cariMenu" />
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1 ?>
                    @foreach ($menu as $m)
                    <tr>
                        <th scope="row">{{$no}}</th>
                        <td>{{$m->nama}}</td>
                        <td>Rp. {{number_format($m->harga)}}</td>
                        <td>
                            <x-button.button wire:click="tambahCart({{$m->id}})" color="primary"
                                class="btn-sm float-right">
                                <x-icon type="plus" />
                            </x-button.button>
                        </td>
                        <?php $no++ ?>
                    </tr>
                    @endforeach
                </tbody>
            </table><br>
            {{ $menu->links() }}
        </x-card>
    </div>
    {{-- {{dd($pemesananId)}} --}}
    <div class="col-6 col-md-6 col-sm-12">
        <x-card>
            <x-slot name="header">Invoice</x-slot>
            <x-input.input placeholder="{{Auth::user()->karyawan->nama}}" readonly>
                <x-slot name="label">Nama Karyawan</x-slot>
            </x-input.input>
            @if ($pemesananId)
            <x-input.input wire:model="nama" placeholder="{{$nama}}" readonly>
                <x-slot name="label">Nama Karyawan</x-slot>
            </x-input.input>
            @else
            <form wire:submit.prevent="pemesanan" method="post">
                <x-input.input wire:model="nama">
                    <x-slot name="label">Nama</x-slot>
                </x-input.input>
                <x-button.button type="submit" color="primary" class="float-right mb-2">
                    <x-icon type="plus" />
                    Tambah Data
                </x-button.button>
            </form>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center"><strong>Invoice</strong></h3>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td class="text-center"><strong>Harga Menu</strong></td>
                                    <td class="text-center"><strong>Kuantitas</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                    <td class="text-right"><strong>Aksi</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($cart))
                                @foreach ($cart as $c)
                                <tr>
                                    <td>{{$c->menu->nama}}</td>
                                    <td class="text-center">Rp. {{number_format($c->menu->harga)}}</td>
                                    <td class="text-center">
                                        <div class="input-group inline-group" style="max-width: 150px;">
                                            <div class="input-group-prepend">
                                                <button wire:click="decrement({{$c->id}})"
                                                    class="btn btn-outline-secondary"
                                                    {{ $c->kuantitas <= 1 ? "disabled" : "" }}>
                                                    <x-icon type="minus" />
                                                </button>
                                            </div>
                                            <input class="form-control quantity" min="1" name="kuantitas"
                                                value="{{$c->kuantitas}}" type="number" readonly>
                                            <div class="input-group-append">
                                                <button wire:click="increment({{$c->id}})"
                                                    class="btn btn-outline-secondary">
                                                    <x-icon type="plus" />
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">Rp. {{number_format($c->harga)}}</td>
                                    <td class="text-right">
                                        <x-button.button wire:click="destroy({{$c->id}})" color="danger" class="btn-sm">
                                            <x-icon type="trash" />
                                        </x-button.button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow">No Data</td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Total</strong></td>
                                    <td class="highrow text-right">Rp. {{ isset($total) ? number_format($total) : '0' }}
                                    </td>
                                    <td class="highrow emptyrow"></td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="text-center"><strong>Uang</strong></td>

                                    <td class="text-right">
                                        <form wire:submit.prevent="hitung" method="post">
                                            <div class="form-group">
                                                <input wire:model="uang" type="text" min="0">
                                                @error('uang')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </form>
                                    </td>
                                    <td class="emptyrow"></td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="text-center"><strong>Kembali</strong></td>
                                    <td class="text-right">
                                        <input wire:model="kembali" type="text" placeholder="0" readonly
                                            value="{{number_format($kembali)}}">
                                    </td>
                                    {{-- {{ isset($kembali) ? number_format($kembali) : '0' }} --}}
                                    <td class="emptyrow"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if ($pemesananId)
                    <x-button.button wire:click="create" color="success" class="float-right mb-2">
                        <x-icon type="plus" />
                        Cetak Invoice
                    </x-button.button>
                    @endif
                </div>
            </div>
        </x-card>
    </div>
</x-div>


@push('style')
<style>
    .height {
        min-height: 200px;
    }

    .table>tbody>tr>.emptyrow {
        border-top: none;
    }

    .table>thead>tr>.emptyrow {
        border-bottom: none;
    }

    .table>tbody>tr>.highrow {
        border-top: 3px solid;
    }

    inline-group {
        max-width: 9rem;
        padding: .5rem;
    }

    .inline-group .form-control {
        text-align: right;
    }

    .form-control[type="number"]::-webkit-inner-spin-button,
    .form-control[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
@endpush

@push('script')
<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'],param['type']);
    })

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    // payment.oninput = () => {
    //     const paymentAmount = document.getElementById("payment").value
    //     const totalAmount = document.getElementById("total").value

    //     const kembalian = paymentAmount - totalAmount

    //     document.getElementById("kembalian").innerHTML = 'Rp. ${Rupiah(kembalian)}'
    // }
    // const rupiah = (angka) => {
    //     const numberString = angka.toString()
    //     const split = numberString.split(',')
    //     const sisa = split[0].length % 3
    //     let rupiah = split[0].substr(0, sisa)
    //     const ribuan = split[0].substr(sisa).match(/\d{1,3}/gi)

    //     if (ribuan) {
    //         const separator = sisa ? '.' : ''
    //         rupiah += separator + ribuan.join('.')
    //     }

    //     return split[1] != undefined ? rupiah + ',' + split[1] + rupiah
    // }
</script>
@endpush