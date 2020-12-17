<x-form>
    <x-slot name="title">Tambah Menu Restoran</x-slot>
    <form wire:submit.prevent="store" method="post">

        <x-input.input wire:model="nomor">
            <x-slot name="label">Nomor Meja</x-slot>
        </x-input.input>

        <x-input.input wire:model="harga">
            <x-slot name="label">Harga</x-slot>
        </x-input.input>

        <x-button.button type="submit" color="primary" class="float-right">Tambah</x-button.button>
    </form>
    <x-button.button wire:click="showIndex" color="danger">Kembali</x-button.button>

</x-form>
