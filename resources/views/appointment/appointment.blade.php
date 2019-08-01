<select id="car_select" name="appointment" class="form-control" required="">
    <option value disabled selected>- Select DATE -</option>

    @foreach ($appointments as $key => $value)
        @foreach ($value as $appointment)
            @if(!$appointment->user_id && !$appointment->form_id)
                <option value="{{ $appointment->id }}">{{ \Carbon\Carbon::parse($appointment->season)->format('H:i')  }}</option>
            @endif
        @endforeach
    @endforeach
</select>