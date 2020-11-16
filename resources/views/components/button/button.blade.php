<button {{ $attributes->merge([ 'type' => 'submit', 'class' => 'btn btn-'.$color ]) }}>{{ $slot }}</button>
