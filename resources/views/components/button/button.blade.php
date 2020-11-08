<button {{ $attributes->merge([ 'type' => 'button', 'class' => 'btn btn-'.$type ]) }}> {{ $slot }} </button>
