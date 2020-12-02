<x-form>
    <x-slot name="title">Data {{$nama}}</x-slot>
    <form wire:submit.prevent="changePass">
        <x-input.input wire:model="email" type="email" readonly>
            <x-slot name="label">email</x-slot>
        </x-input.input>

        <x-input.input wire:model="username" readonly>
            <x-slot name="label">username</x-slot>
        </x-input.input>

        <x-input.input wire:model="nama" readonly>
            <x-slot name="label">nama</x-slot>
        </x-input.input>

        <x-button.button type="submit" color="primary" class="float-right">Ganti Password
            {{-- <x-button.button wire:click="changePass" color="primary" class="float-right">Ganti Password --}}
        </x-button.button>
    </form>

</x-form>
