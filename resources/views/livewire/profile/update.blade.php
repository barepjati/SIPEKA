<x-form>
    <x-slot name="title">Edit Password {{$nama}}</x-slot>
    <form wire:submit.prevent="update" method="POST">
        @method('put')
        <x-input.input wire:model="password" type="password">
            <x-slot name="label">password</x-slot>
        </x-input.input>

        <x-input.input wire:model="newpassword" type="password">
            <x-slot name="label">newpassword</x-slot>
        </x-input.input>

        <x-input.input wire:model="newconfirmpassword" type="password">
            <x-slot name="label">newconfirmpassword</x-slot>
        </x-input.input>

        <x-button.button wire:click="showIndex" color="danger">Kembali</x-button.button>
        <x-button.button type="submit" color="primary" class="float-right">Update Data
        </x-button.button>
    </form>

</x-form>
