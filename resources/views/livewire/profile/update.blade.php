<x-form>
    <x-slot name="title">Edit Password {{$nama}}</x-slot>
    <form wire:submit.prevent="update" method="POST">
        @method('put')
        <x-input.input wire:model="old" type="password">
            <x-slot name="label">Old Password</x-slot>
        </x-input.input>

        <x-input.input wire:model="new" id="password" type="password" name="password" autocomplete="new-password"
            placeholder="Password">
            <x-slot name="label">New Password</x-slot>
        </x-input.input>

        <x-input.input wire:model="confirm" type="password" name="new_confirmation" autocomplete="new-password"
            placeholder="Confirm Password">
            <x-slot name="label">Konfirmasi Password</x-slot>
        </x-input.input>

        <x-button.button type="submit" color="primary" class="float-right">Update Data
        </x-button.button>
    </form>

    <x-button.button wire:click="showIndex" type="button" color="danger">Kembali</x-button.button>
</x-form>
