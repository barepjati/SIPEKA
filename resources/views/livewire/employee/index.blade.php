{{-- <div class="row"> --}}
<x-table title="Data Karyawan" id="dt">
    <x-slot name="button">
        <x-button.button wire:click="create" type="primary" class="float-right mb-2">
            <x-icon type="plus" />
            Tambah Data
        </x-button.button>
    </x-slot>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($data as $k)
        <tr>
            <td>{{$no}}</td>
            <td>{{$k->nama}}</td>
            <td>
                <x-button.button wire:click="edit({{$k->id}})" type="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Edit
                </x-button.button>
                <x-button.button wire:click="$emit('destroy', {{$k->id}})" type="danger" class="btn-sm">
                    <x-icon type="trash" />
                    Delete
                </x-button.button>
            </td>
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </tfoot>
</x-table>
{{-- </div> --}}
