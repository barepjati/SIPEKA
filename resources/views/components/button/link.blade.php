<button {{ $attributes->merge([ 'type' => 'submit', 'class' => 'btn btn-'.$color ]) }}>
    <a href={{$link}} class="text-white">{{ $slot }}</a>
</button>
