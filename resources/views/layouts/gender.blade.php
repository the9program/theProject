<div class="{{ $width }}">

    <div class="form-group {{ ($errors->has($name)) ? 'has-error' : ""}}">

        <label for="{{ $name }}" class="control-label">{{ $label }}</label>

        <select name="{{ $name }}" id="{{ $name }}"
                class="form-control border-dark" {{ $attribute }}>
                <option value="1" {{ ($value) ? 'selected' : '' }}>Homme</option>
                <option value="0" {{ (!$value) ? 'selected' : '' }}>Femme</option>
        </select>

        @if($errors->has( $name ))
            <div class="alert alert-danger mt-5" role="alert">
                <span class="text-danger">{{ $errors->first( $name ) }}</span>
            </div>
        @endif
    </div>

</div>