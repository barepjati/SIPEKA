<div class="container-fluid">
    <div class="row">
        <x-material.infobox col="col-md-3 col-6" icon="stats-bars" color="primary" :count="$kriteria"
            label="Kriteria" />
        <x-material.infobox col="col-md-3 col-6" icon="bag" color="warning" :count="$alternatif" label="Alternatif" />
        <x-material.infobox col="col-md-3 col-6" icon="person" color="danger" :count="$user" label="User" />
    </div>
    {{-- {{dd(Auth::user()->role_id)}} --}}
</div>
