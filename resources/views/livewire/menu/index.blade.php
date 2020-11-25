{{-- <div class="row"> --}}
<x-table title="Data Menu Restoran" id="dt">
    <x-slot name="button">
        @if (Auth::user()->role->nama == 'manajer')
        <x-button.button wire:click="create" color="primary" class="float-right mb-2">
            <x-icon type="plus" />
            Tambah Data
        </x-button.button>
        @endif
    </x-slot>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Status</th>
            @if (Auth::user()->role->nama == 'manajer')
            <th>Ubah Status</th>
            <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($menu as $m)
        <tr>
            <td>{{$no}}</td>
            <td>{{$m->nama}}</td>
            <td>{{number_format($m->harga)}}</td>
            <td>{{$m->kategori->nama}}</td>
            <td>{{$m->status}}</td>
            @if (Auth::user()->role->nama == 'manajer')
            <td>
                @if ($m->status == 'habis')
                <x-button.button wire:click="tersedia({{$m->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Tersedia
                </x-button.button>
                @elseif($m->status == 'tersedia')
                <x-button.button wire:click="habis({{$m->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Habis
                </x-button.button>
                @endif
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
