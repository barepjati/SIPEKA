<div class="row">
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
                <td>aksi</td>
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
</div>
