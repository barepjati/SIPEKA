<div {{ $attributes->merge(['class' => 'card card-primary card-outline']) }}>
    <div class="card-header">
        {{$header}}
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
