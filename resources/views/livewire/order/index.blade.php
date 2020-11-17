{{-- <div class="row"> --}}
<x-table title="Daftar Data Transaksi Penjualan" id="dt">
    <x-slot name="button">
        @if (Auth::user()->role->nama == 'karyawan')
        <x-button.button wire:click="create" color="primary" class="float-right mb-2">
            <x-icon type="plus" />
            Tambah Data
        </x-button.button>
        @endif
    </x-slot>
    <thead>
        <tr>
            <th>No Transakasi</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Status</th>
            @if (Auth::user()->role->nama == 'manajer')
            <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($transaksi as $t)
        <tr>
            <td>{{$no}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            {{-- <td>{{$t->nama}}</td>
            <td>{{number_format($t->harga)}}</td>
            <td>{{$t->kategori->nama}}</td>
            @if (Auth::user()->role->nama == 'manajer')
            <td>
                <x-button.button wire:click="edit({{$t->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Edit
                </x-button.button>
                <x-button.button wire:click="$emit('destroy', {{$t->id}})" color="danger" class="btn-sm">
                    <x-icon type="trash" />
                    Delete
                </x-button.button>
            </td>
            @endif --}}
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
{{-- </div> --}}
