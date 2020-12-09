<x-table title="Daftar Data Pemesanan" id="dt">
    <x-slot name="button">
        <x-button.button wire:click="create" color="primary" class="float-right mb-2">
            <x-icon type="plus" />
            Tambah Data
        </x-button.button>
    </x-slot>
    <thead>
        <tr>
            <th>No</th>
            <th>No Transakasi</th>
            <th>Nama</th>
            <th>Total</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($transaksi as $t)
        <tr>
            <td>{{$no}}</td>
            <td>{{$t->no_transaksi}}</td>
            <td>{{$t->nama}}</td>
            <td>{{$t->total}}</td>
            <td>
                @if ($t->status == 'selesai')
                <x-button.button wire:click="detail({{$t->id}})" color="primary" class="btn-sm float-right">
                    <x-icon type="pencil-alt" />
                    Detail
                </x-button.button>
                @elseif($t->status == 'dikirim')
                <span class="float-right badge badge-primary">Menunggu Pelanggan</span>
                @else
                <span class="float-right badge badge-primary">Perlu Dikirim</span>
                @endif
            </td>
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
