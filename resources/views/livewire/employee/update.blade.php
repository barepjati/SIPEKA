<x-form>
    <x-slot name="title">Edit {{$nama}}</x-slot>
    <form wire:submit.prevent="update" method="POST">
        @method('put')
        <x-input.input wire:model="email" type="email">
            <x-slot name="label">email</x-slot>
        </x-input.input>

        <x-input.input wire:model="username">
            <x-slot name="label">username</x-slot>
        </x-input.input>

        <x-input.input wire:model="nama">
            <x-slot name="label">nama</x-slot>
        </x-input.input>

        <x-button.button type="submit" color="primary" class="float-right">Update Data</x-button.button>
    </form>
    <x-button.button wire:click="showIndex" color="danger">Kembali</x-button.button>
</x-form>
