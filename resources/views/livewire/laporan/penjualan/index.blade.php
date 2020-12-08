<x-div>
    <x-div class="row">
        <x-material.infobox col="col-md-4 col-12" icon="stats-bars" color="primary" :count="number_format($total)"
            label="Pendapatan Penjualan Bulan ini">
            @if ($total > $yesterday)
            <x-slot name="span">
                <span>{{abs(round($persen, 0))}}% kenaikan Penjualan dari Bulan Lalu</span>
            </x-slot>
            @endif
        </x-material.infobox>
        <x-material.infobox col="col-md-4 col-12" icon="stats-bars" color="primary" :count="number_format($yesterday)"
            label="Pendapatan Penjualan Bulan Kemarin" />
        <x-material.infobox col="col-md-4 col-12" icon="stats-bars" color="primary" :count="count($count)"
            label="Total Penjualan Bulan Ini" />
    </x-div>
    <x-div class="row">
        <x-form>
            <x-slot name="title">Filter</x-slot>
            <x-div class="row">
                <x-div class="col-md-6 col-12">
                    <x-input.datepicker wire:model="month" id="month" type="text" placeholder="Bulan">
                        <x-slot name="label">
                            <x-input.label>Bulan</x-input.label>
                        </x-slot>
                    </x-input.datepicker>
                </x-div>
                <x-div class="col-md-6 col-12">
                    <x-input.datepicker wire:model="year" id="year" type="text" placeholder="Tahun">
                        <x-slot name="label">
                            <x-input.label>Tahun</x-input.label>
                        </x-slot>
                    </x-input.datepicker>
                </x-div>
            </x-div>
        </x-form>
    </x-div>
    <x-card>
        <x-slot name="header">Data Penjualan</x-slot>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Total Item</th>
                </tr>
            </thead>
            <tbody>
                @if ($data == null)
                <tr>
                    <td class="emptyrow"></td>
                    <td class="emptyrow">No data</td>
                    <td class="emptyrow"></td>
                    <td class="emptyrow"></td>
                </tr>
                @else
                <?php $no=1 ?>
                @foreach ($data as $d)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->total}}</td>
                    <td>{{count($detail->where('transaksi_id', $d->id))}}</td>
                    <?php $no++ ?>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table><br>
        <x-div class="float-right">
            {{ $data->links() }}
        </x-div>
    </x-card>
</x-div>
