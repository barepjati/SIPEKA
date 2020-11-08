<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-info float-right']) }}>
    {{ $slot }}
</button>
