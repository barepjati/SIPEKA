<x-div>
    @php
    $total = count($pemesanan)
    @endphp
    <x-div class="row">
        <x-material.infobox col="col-12" icon="stats-bars" color="primary" :count="$total"
            label="Total Semua Data Pemesanan" />
    </x-div>

    <x-table title="Data Karyawan" id="dt">
        <x-slot name="button">

        </x-slot>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Total Transaksi</th>
                <th>Persentase Kinerja</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            <?php $no=1 ?>
            @foreach ($karyawan as $k)
            <tr>
                <td>{{$no}}</td>
                <td>{{$k->nama}}</td>
                <td>{{ $count = count($pemesanan->where('user_id', $k->user->id)) }}</td>
                <td>{{ abs(round($count / $total * 100, 0)) }}%</td>
                <?php $no++ ?>
            </tr>
            @endforeach
        </tbody>
    </x-table>
</x-div>
