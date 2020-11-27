{{-- {{dd($pemesananId, $uang, date('Y-m-d : H:i:s', strtotime($dibuat)))}} --}}
<x-div class="flex-container-1">
    <x-div class="left">
        <ul>
            <li>No Order</li>
            <li>Kasir</li>
            <li>Tanggal</li>
        </ul>
    </x-div>
    <x-div class="right">
        <ul>
            <li> {{ $no_transaksi }} </li>
            <li> {{ $user }} </li>
            <li> {{ date('Y-m-d : H:i:s', strtotime($dibuat)) }} </li>
        </ul>
    </x-div>
</x-div>
<hr>
<x-div class="flex-container" style="margin-bottom: 10px; text-align:right;">
    <x-div style="text-align: left;">Nama Product</x-div>
    <x-div>Harga/Qty</x-div>
    <x-div>Total</x-div>
</x-div>
@foreach ($cart as $c)
<x-div class="flex-container" style="text-align: right;">
    <x-div style="text-align: left;">{{ $c->kuantitas }}x {{ $c->menu->nama }}</x-div>
    <x-div>Rp {{ number_format($c->menu->harga) }} </x-div>
    <x-div>Rp {{ number_format($c->harga) }} </x-div>
</x-div>
@endforeach
<hr>
<x-div class="flex-container" style="text-align: right; margin-top: 10px;">
    <x-div></x-div>
    <x-div>
        <ul>
            <li>Grand Total</li>
            <li>Pembayaran</li>
            <li>Kembalian</li>
        </ul>
    </x-div>
    <x-div style="text-align: right;">
        <ul>
            <li>Rp {{ number_format($total) }} </li>
            <li>Rp {{ number_format($uang) }}</li>
            <li>Rp {{ number_format($uang-$total) }}</li>
        </ul>
    </x-div>
</x-div>
<hr>
<x-div class="header" style="margin-top: 50px;">
    <h3>Terimakasih</h3>
    <p>Silahkan berkunjung kembali</p>

</x-div>

@push('script')
<script type="text/javascript">
    document.addEventListener('livewire:load', function () {
        @this.on("load", window.print())
    })
</script>
@endpush
