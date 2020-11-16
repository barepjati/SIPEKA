@extends('layouts.myview')

@section('content')
@livewire('employee.update', ['id' => $karyawan->id])
{{-- @livewire('component', ['user' => $user], key($user->id)) --}}
@endsection
