<x-form>
    <x-slot name="title">Create Employee</x-slot>
    <form wire:submit.prevent="store" method="post">

        <x-input.input wire:model="email" type="email">
            <x-slot name="label">Email</x-slot>
        </x-input.input>

        <x-input.input wire:model="username">
            <x-slot name="label">Username</x-slot>
        </x-input.input>

        <x-input.input wire:model="nama">
            <x-slot name="label">Nama</x-slot>
        </x-input.input>

        {{-- {{var_dump($errors)}} --}}

        <x-button.button wire:click="showIndex" color="danger">Kembali</x-button.button>
        <x-button.button type="submit" color="primary" class="float-right">Tambah</x-button.button>
    </form>

</x-form>
