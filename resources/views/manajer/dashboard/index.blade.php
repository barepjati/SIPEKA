@extends('layouts.view')
@section('content')
<div class="container-fluid">
    <div class="row">
        <x-material.infobox col="col-md-3 col-6" icon="stats-bars" color="primary" :count="$jmlkaryawan"
            label="Karyawan" />
        <x-material.infobox col="col-md-3 col-6" icon="bag" color="warning" :count="$jmlmenu" label="Alternatif" />
        <x-material.infobox col="col-md-3 col-6" icon="person" color="danger" :count="$jmlkategori" label="User" />
    </div>
    {{-- {{dd(Auth::user()->role_id)}} --}}
</div>
@endsection
