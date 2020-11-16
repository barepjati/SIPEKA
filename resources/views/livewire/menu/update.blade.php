<x-form>
    <form wire:submit.prevent="update" method="POST">
        @method('put')
        <x-slot name="title">Edit {{$nama}}</x-slot>
        {{-- {{dd($kategoriId)}} --}}
        <x-input.select2 data="$kategori" select-type="label" id="kategori" name="kategori">
            <x-slot name="label">Kategori</x-slot>
            <x-slot name="opt">
                <option value="{{$kategoriId}}" selected>{{$kategori}}</option>
                @foreach ($dataKategori as $k)
                @if ($k->nama != $kategori)
                <option value="{{$k->id}}" style="display: none;">{{$k->nama}}</option>
                @endif
                @endforeach
            </x-slot>
        </x-input.select2>

        <x-input.input wire:model="nama">
            <x-slot name="label">Nama</x-slot>
        </x-input.input>

        <x-input.input wire:model="harga">
            <x-slot name="label">Harga</x-slot>
        </x-input.input>

        <x-input.textarea wire:model="deskripsi">
            <x-slot name="label">Deskripsi</x-slot>
        </x-input.textarea>

        <x-button.button type="submit" color="primary" class="float-right">Update Data</x-button.button>
    </form>
    <x-button.button wire:click="showIndex" color="danger">Kembali</x-button.button>
</x-form>
