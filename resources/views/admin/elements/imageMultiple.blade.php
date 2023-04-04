<div class="form-group">
    <label for="{{ $property }}">{{ $label }}</label>
    <div id="multipleImageContainer" class="my-2 d-flex" style="gap: 10px">
        @if(isset($model) && isset($model->{$property}))
            @foreach($model->{$property} as $imagePath)
                <img class="singleImage" height="100" src="{{ url('storage/' . $imagePath ) }}" alt="{{ $label }}">
            @endforeach
        @endif
    </div>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" multiple name="{{ $property }}[]" class="custom-file-input custom-file-input-multiple" id="{{ $property }}" />
            <label class="custom-file-label" for="{{ $property }}">Choose {{ $property }}</label>
        </div>
    </div>
    @error($property)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        let input = document.querySelector(".custom-file-input-multiple")
        input.onchange = (evt) => {
            let items = '';
            document.querySelector('#multipleImageContainer').innerHTML = ""
            for (let i = 0; i < input.files.length; i++) {
                let src = URL.createObjectURL(input.files[i])
                items += `<img height="100" id="singleImage" src="${src}"/>`
            }
            document.querySelector('#multipleImageContainer').innerHTML = items
        }
    })
</script>
