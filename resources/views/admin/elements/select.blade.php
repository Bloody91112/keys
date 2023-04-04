<div class="form-group">
    <label for="{{ $property }}">{{ $label }}</label>
    <select id="{{ $property }}" name="{{ $property }}" class="form-control select2" style="width: 100%;">
        <option selected disabled> Choose {{ strtolower($label) }}</option>
        @foreach($add_model as $item)
            @php
                $title = is_object($item) ? $item->title : $item['title'];
                $id = is_object($item) ? $item->id : $item['id'];
            @endphp
            <option {{ isset($model) && $model->{$property} === $id ? 'selected' : '' }} value="{{ $id }}">
                {{ $title }}
            </option>
        @endforeach
    </select>
    @error($property)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
