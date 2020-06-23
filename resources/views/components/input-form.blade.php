<div class="form-group @error("$name") has-label has-danger @enderror ">
    <label class="@error("$name") error @enderror">{{ $label }}</label>
    <input class="form-control" name="{{ $name }}" value="{{ $VefiryValue($value) ? old("$name") : $value }}" type="{{ $type }}" {{ $attr }} >
    @error("$name")
        <label class="error" for="{{ $name }}">{{ $message }}</label>
    @enderror
</div>