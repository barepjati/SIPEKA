@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
{{-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> --}}

{{-- <div class="form-group">
    <label for="{{ $id }}" class="col-lg-2 control-label">{{ $label }}</label>
<div class="col-sm-6">
    <input @isset($required) required="required" @endisset @isset($readonly) readonly="readonly" @endisset
        name="{{ isset($name) ? $name : $id }}" type="text" class="form-control" id="{{ $id }}"
        placeholder="{{ $label }}"
        value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}">
</div>
</div> --}}
