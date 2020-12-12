<x-form>
    <x-slot name="title">Edit Alamat {{$nama}}</x-slot>
    <form wire:submit.prevent="update" method="POST">
        @method('put')

        <x-input.textarea wire:model="alamat" placeholder="{{$alamat}}">
            <x-slot name="label">Alamat</x-slot>
        </x-input.textarea>

        <x-button.button type="submit" color="primary" class="float-right">Update Data
        </x-button.button>
    </form>

    <x-button.button wire:click="showIndex" type="button" color="danger">Kembali</x-button.button>
</x-form>
