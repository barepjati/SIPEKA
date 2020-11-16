<div class="form-group">
    <x-input.label for="{{$label}}">{{ucfirst($label)}}</x-input.label>
    <textarea
        {{ $attributes->merge(['class' => 'form-control', 'rows' => 5, 'placeholder' => 'masukan '.$label]) }}></textarea>
    @error(strtolower($label))
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
