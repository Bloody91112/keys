<div class="form-check mb-2">
    <input type="hidden" name="{{ $property }}" value="0">
    <input type="checkbox" {{ isset($model) && $model->{$property} === 1 ? 'checked' : '' }} value="1"
           name="{{ $property }}" class="form-check-input" id="{{ $property }}"/>
    <label class="form-check-label" for="{{ $property }}">{{ $label }}</label>
    @error($property)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
