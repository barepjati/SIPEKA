@extends('layouts.myview')

@section('content')
{{-- {{dd($menu)}}; --}}
@livewire('profile.index', [])
@endsection
