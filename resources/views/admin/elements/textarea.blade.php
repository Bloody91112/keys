<div class="form-group">
    <label for="summernote-{{ $property }}">{{ $label }}</label>
    <textarea type="text" class="form-control" name="{{ $property }}" id="summernote-{{ $property }}"
              placeholder="{{ $placeholder ?? $label }}">{{ $model ? $model->{$property} : old($property) ?? "" }}</textarea>
    @error($property)
    <div class="text-danger">{{ $message }}</div>
    @enderror
    @if(!isset($simple))
        <script>
            document.addEventListener("DOMContentLoaded", function(){
                $('#summernote-{{$property}}').summernote()
            })
        </script>
    @endif
</div>
