<x-form>
    <form wire:submit.prevent="update" method="POST">
        @method('put')
        <x-slot name="title">Edit Kategor {{$nama}}</x-slot>
        <x-input.select2 data="$kategori" select-type="label" id="kategori" name="kategori" disabled>
            <x-slot name="label">Kategori</x-slot>
            <x-slot name="opt">
                {{-- <option value="{{$kategoriId}}" selected>{{$kategori}}</option> --}}
                @foreach ($data as $d)
                <option value="{{$d->id}}">{{$d->nama}}</option>
                @endforeach
            </x-slot>
        </x-input.select2>
    </form>
</x-form>
