@extends('layouts.myview')

@section('content')
{{-- {{dd($menu)}}; --}}
{{-- @if (isset($data)) --}}
{{-- @livewire('menu.edit-category', ['id' => $menu->id]) --}}
{{-- @else --}}
@livewire('menu.update', ['id' => $menu->id])
{{-- @endif --}}
@endsection
