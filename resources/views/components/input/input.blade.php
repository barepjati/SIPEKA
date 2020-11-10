<div class="form-group">
    <x-input.label for="{{$label}}">{{ucfirst($label)}}</x-input.label>
    <input {{ $attributes->merge(['type'=>'text', 'class'=>'form-control', 'placeholder'=>$label]) }}>
    @error(strtolower($label))
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- <input @isset($required) required="required" @endisset @isset($readonly) readonly="readonly" @endisset
    name="{{ isset($name) ? $name : $id }}" type="text" class="form-control" id="{{ $id }}" placeholder="{{ $label }}"
value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}"> --}}
