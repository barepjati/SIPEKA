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

        @if (Auth::user()->role_id == 3)
        <x-input.textarea value="{{$alamat->alamat}}" placeholder="{{$alamat->alamat}}" readonly>
            <x-slot name="label">Alamat</x-slot>
        </x-input.textarea>
        @endif

        <x-button.button type="submit" color="primary" class="float-right">Ganti Password
        </x-button.button>
    </form>
    @if (Auth::user()->role_id == 3)
    <x-button.button wire:click="alamat" type="submit" color="primary">Ganti Alamat
    </x-button.button>
    @endif
</x-form>
