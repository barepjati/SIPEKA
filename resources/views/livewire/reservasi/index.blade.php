<x-table title="Data Reservasi" id="dt">
    <x-slot name="button">
        @if (Auth::user()->role->nama == 'pelanggan')
        <x-button.button wire:click="create" color="primary" class="float-right mb-2">
            <x-icon type="plus" />
            Tambah Data
        </x-button.button>
        @endif
    </x-slot>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Meja</th>
            <th>Jumlah item</th>
            <th>Harga Reservasi</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($data as $m)
        <tr>
            <td>{{$no}}</td>
            <td>MJ{{$m->meja->no_meja}}</td>
            <td>{{count($detail->where('transaksi_id', $m->id))}}</td>
            <td>Rp. {{number_format($m->meja->harga)}}</td>
            <td>{{$m->total}}</td>
            {{-- @if (Auth::user()->role->nama == 'pelanggan') --}}
            <td>
                <x-button.button wire:click="edit({{$m->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    detail
                </x-button.button>
                {{-- <x-button.button wire:click="$emit('destroy', {{$m->id}})" color="danger" class="btn-sm">
                <x-icon type="trash" />
                Hapus
                </x-button.button> --}}
            </td>
            {{-- @endif --}}
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
