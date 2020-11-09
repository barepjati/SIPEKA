{{-- @props(['value'])

<label {{ $attributes }}>
{{ $value ?? $slot }}
</label> --}}

<label {{ $attributes }}>{{$slot}}</label>
