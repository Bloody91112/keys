<div class="form-group">
    <label for="{{ $property }}">{{ $label }}</label>
    <div class="input-group date" id="{{ $property }}" data-target-input="nearest">
        <input type="text" name="{{ $property }}" class="form-control datetimepicker-input" value="{{ isset($model) ? $model->{$property} : "" }}" data-target="#{{ $property }}">
        <div class="input-group-append" data-target="#{{ $property }}" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    @error($property)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#{{ $property}}').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    })

</script>
