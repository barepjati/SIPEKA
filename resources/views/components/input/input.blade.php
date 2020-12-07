<div class="form-group">
    <x-input.label for="{{$label}}">{{ucfirst($label)}}</x-input.label>
    <input {{ $attributes->merge(['type'=>'text', 'class'=>'form-control', 'placeholder'=>$label]) }}>
    {{-- {{dd(strtolower(substr($label, 0, strrpos($label, ' ') ? strrpos($label, ' ') : strlen($label))), $label, substr($label, 0), strrpos($label, ' '))}}
    --}}
    @error(strtolower(substr($label, 0, strrpos($label, ' ') ? strrpos($label, ' ') : strlen($label))))
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
