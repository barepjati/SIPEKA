@extends('layouts.myview')

@section('content')
@livewire('reservasi.detail', ['id'=>$id])
@endsection
