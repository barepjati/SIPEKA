@extends('layouts.myview')

@section('content')
@livewire('table.update', ['id' => $id])
@endsection
