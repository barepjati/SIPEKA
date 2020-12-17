{{-- <div class="row"> --}}
<x-table title="Data Meja Restoran" id="dt">
    @if (Auth::user()->role->nama == 'manajer')
    <x-slot name="button">
        <x-button.button wire:click="create" color="primary" class="float-right mb-2">
            <x-icon type="plus" />
            Tambah Data
        </x-button.button>
    </x-slot>
    @endif
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Meja</th>
            <th>Harga</th>
            @if (Auth::user()->role->nama == 'manajer')
            <th>Ubah Status</th>
            <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($meja as $m)
        <tr>
            <td>{{$no}}</td>
            <td>MJ{{$m->no_meja}}</td>
            <td>{{number_format($m->harga)}}</td>
            @if (Auth::user()->role->nama == 'manajer')
            <td>
                {{-- @if ($m->status == 'dipesan')
                <x-button.button wire:click="tersedia({{$m->id}})" color="primary" class="btn-sm">
                <x-icon type="pencil-alt" />
                Tersedia
                </x-button.button>
                @elseif($m->status == 'tersedia')
                <x-button.button wire:click="habis({{$m->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Habis
                </x-button.button>
                @endif --}}
            </td>
            <td>
                <x-button.button wire:click="edit({{$m->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Edit
                </x-button.button>
                <x-button.button wire:click="$emit('destroy', {{$m->id}})" color="danger" class="btn-sm">
                    <x-icon type="trash" />
                    Hapus
                </x-button.button>
            </td>
            @endif
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
{{-- </div> --}}
