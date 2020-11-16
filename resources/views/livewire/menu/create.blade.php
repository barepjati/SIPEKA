<x-form>
    <x-slot name="title">Tambah Menu Restoran</x-slot>
    <form wire:submit.prevent="store" method="post">

        <x-input.select2 data="$kategori" select-type="label" id="kategori" name="kategori">
            <x-slot name="label">Kategori</x-slot>
            <x-slot name="opt">
                @foreach ($kategori as $k)
                <option value="{{$k->id}}">{{$k->nama}}</option>
                @endforeach
            </x-slot>
        </x-input.select2>

        <x-input.input wire:model="nama">
            <x-slot name="label">Nama</x-slot>
        </x-input.input>

        <x-input.input wire:model="harga" type="number">
            <x-slot name="label">Harga</x-slot>
        </x-input.input>

        <x-input.textarea wire:model="deskripsi">
            <x-slot name="label">Deskripsi</x-slot>
        </x-input.textarea>

        <x-button.button type="submit" color="primary" class="float-right">Tambah</x-button.button>
    </form>
    <x-button.button wire:click="showIndex" color="danger">Kembali</x-button.button>

</x-form>
