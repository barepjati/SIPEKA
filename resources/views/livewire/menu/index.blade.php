{{-- <div class="row"> --}}
<x-table title="Data Menu Restoran" id="dt">
    <x-slot name="button">
        <x-button.button wire:click="create" color="primary" class="float-right mb-2">
            <x-icon type="plus" />
            Tambah Data
        </x-button.button>
    </x-slot>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Action</th>
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
            <td>
                <x-button.button wire:click="edit({{$m->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Edit
                </x-button.button>
                <x-button.button wire:click="$emit('destroy', {{$m->id}})" color="danger" class="btn-sm">
                    <x-icon type="trash" />
                    Delete
                </x-button.button>
            </td>
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
{{-- </div> --}}
