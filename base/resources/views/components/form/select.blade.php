<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="form-control {{ $class }}" id="{{ $name }}" name="{{ $name }}">
        <option value="">--Select--</option>
        @foreach ($options as $option)
            <option value="{{ $option[$valueKey] }}">{{ $option[$nameKey] }}</option>
        @endforeach
    </select>
    <span class="help-block" style="color: red;">@error($name) {{$message}} @enderror</span>
</div>
