<div class="form-group">
    <label for="{{ $property }}">{{ $label }}</label>
    <select id="{{ $property }}" name="{{ $property }}[]" class="select2" multiple="multiple"
            data-placeholder="Select {{ strtolower($label) }}" style="width: 100%;">
        @foreach($add_model as $item )
            <option {{ isset($model)
                       && is_array( $model->{$property}->pluck('id')->toArray() )
                       && in_array($item->id, $model->{$property}->pluck('id')->toArray() )
                       ? 'selected' : '' }} value="{{ $item->id }}">
                {{ $item->title }}
            </option>
        @endforeach
    </select>
    @error($property)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
