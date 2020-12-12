<x-table title="Data Menu Restoran" id="dt">
    <thead>
        <tr>
            <th>No</th>
            <th>No Transaksi</th>
            <th>Total Item</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($data as $d)
        <tr>
            <td>{{$no}}</td>
            <td>{{$d->no_transaksi}}</td>
            <td>{{count($item->where('transaksi_id', $d->id))}}</td>
            <td>{{$d->total}}</td>
            <td>
                @if ($d->status == 'pending')
                <span class="badge badge-warning">{{$d->status}}</span>
                @elseif ($d->status == 'diproses')
                <span class="badge badge-info">{{$d->status}}</span>
                @else
                <span class="badge badge-success">{{$d->status}}</span>
                @endif
            </td>
            <td>
                <x-button.button wire:click="detail({{$d->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Detail Pesanan
                </x-button.button>
            </td>
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
