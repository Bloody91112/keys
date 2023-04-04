<div class="form-group">
    <label for="{{ $property }}">{{ $label }}</label>
    <div id="singleImageContainer" class="my-2">
        @if(isset($model) && isset($model->{$property}))
            <img height="150" class="singleImage" src="{{ url('storage/' . $model->{$property} ) }}" alt="{{ $label }}">
        @endif
    </div>
    <div class="input-group">
        <div class="custom-file">
            <input name="{{ $property }}" type="file" class="custom-file-input" id="{{ $property }}">
            <label class="custom-file-label" for="{{ $property }}">
                {{ isset($model) ? 'Update' : 'Choose' }} {{ $property }}
            </label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
    </div>
    @error($property)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        let input = document.querySelector("[name={{ $property }}]")
        input.onchange = (evt) => {
            const [file] = input.files
            if (file) {
                let imagePreview = document.querySelector('.singleImage')
                let src = URL.createObjectURL(file)
                if (imagePreview){
                    imagePreview.src = src
                } else {
                    document.querySelector('#singleImageContainer').innerHTML = `<img height="150" id="singleImage" src="${src}" />`
                }
            }
        }
    })
</script>
