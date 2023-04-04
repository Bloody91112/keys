<div class="form-group">
    <label for="{{ $property }}">{{ $label }}</label>
    <input type="text" class="form-control" name="{{ $property }}" value="{{ isset($model) ? $model->{$property} : "" }}"
           id="{{ $property }}" placeholder="{{ $placeholder ?? $label }}">
    @error($property)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
