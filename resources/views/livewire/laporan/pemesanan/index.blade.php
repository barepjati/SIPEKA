<x-div>
    <x-div class="row">
        <x-material.infobox col="col-12" icon="stats-bars" color="primary" :count="count($data)"
            label="Total Data Pemesanan" />
    </x-div>
    {{-- {{dd($data)}} --}}
    <x-table title="Data Karyawan" id="dt">
        <x-slot name="button">

        </x-slot>
        <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Nama</th>
                <th>Total Harga</th>
                <th>Total Item</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1 ?>
            @foreach ($data as $d)
            <tr>
                <td>{{$no}}</td>
                <td>{{$d->no_transaksi}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->total}}</td>
                <td>{{count($detail->where('transaksi_id', $d->id))}}</td>
                <?php $no++ ?>
            </tr>
            @endforeach
        </tbody>
    </x-table>
</x-div>
