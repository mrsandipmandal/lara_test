<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="{{ $class }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"  @foreach ($options as $key => $option) {{ $key }}="{{ $option }}" @endforeach>
    <span class="help-block" style="color: red;"> @error($name) {{ $message }} @enderror </span>
</div>
