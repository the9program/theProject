<div class="{{ $width }}">
    <div class="form-group {{ ($errors->has('specialty')) ? 'has-error' : ""}}">
        <label for="specialty"
               class="control-label">{{ ucfirst(__('validation.attributes.specialty')) . ' *:' }}</label>
        <select name="specialty" id="specialty" class="form-control" required>
            @if(!old('specialty') && !isset($specialty))
                <option value selected disabled>{{ ucfirst(__('validation.attributes.specialty')) }}</option>
            @endif
            @foreach(\App\Specialty::all() as $specialties)
                <option value="{{ $specialties->id }}"
                        @if(old('specialty') && (old('specialty') == $specialties->id))
                        selected
                        @else
                        @if(isset($specialty) && $specialty->id == $specialties->id)
                        selected
                        @endif
                        @endif>{{ $specialties->specialty }}</option>
            @endforeach
        </select>
        @if ($errors->has('specialty'))
            <div class="alert alert-danger mt-5" role="alert">
                <span class="text-danger">{{ $errors->first( 'specialty' ) }}</span>
            </div>
        @endif
    </div>
</div>