<x-form>
    <x-slot name="title">Edit Password {{$nama}}</x-slot>
    <form wire:submit.prevent="update" method="POST">
        @method('put')
        <x-input.input wire:model="old" type="password">
            <x-slot name="label">Old Password</x-slot>
        </x-input.input>

        <x-input.input wire:model="new" type="password">
            <x-slot name="label">New Password</x-slot>
        </x-input.input>

        <x-input.input wire:model="konfirmasi" type="password">
            <x-slot name="label">Konfirmasi Password</x-slot>
        </x-input.input>

        <x-button.button wire:click="showIndex" color="danger">Kembali</x-button.button>
        <x-button.button type="submit" color="primary" class="float-right">Update Data
        </x-button.button>
    </form>

</x-form>
