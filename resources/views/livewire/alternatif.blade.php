<div class="row">
    <x-table title="Data Alternatif" id="dt">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1 ?>
            @foreach ($data as $a)
            <tr>
                <td>{{$no}}</td>
                <td>{{$a->nama}}</td>
                <td>
                    <div class="col text-center">
                        <x-button.button wire:click="" class="btn-sm">
                            <x-button.icon class="fas fa-edit" />
                            {{ __('Edit') }}
                        </x-button.button>
                        <x-button.button wire:click="" class="btn-danger btn-sm">
                            <x-button.icon class="fas fa-trash" />
                            {{ __('Hapus') }}
                        </x-button.button>
                    </div>
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
</div>
