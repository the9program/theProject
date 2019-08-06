@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <ul>
                @foreach($appointments as $appointment)
                    @if(!$appointment->form_id && !$appointment->user_id)
                        <li>{{ \Carbon\Carbon::parse($appointment->season)->format('H:i') }}</li>
                        <li><a href="{{ route('appointment.edit',compact('appointment')) }}"
                               class="btn btn-border hvr-bounce-to-right btn-theme-colored">Ajouté un patient</a></li>
                    @elseif(!$appointment->form_id && $appointment->user_id)
                        <li class="text-danger">{{ \Carbon\Carbon::parse($appointment->season)->format('H:i') }}</li>
                        <li><a href="{{ route('appointment.passed',compact('appointment')) }}"
                               class="btn btn-border hvr-bounce-to-right btn-theme-colored">Passed</a></li>
                    @elseif(!$appointment->passed)
                        <li>{{ \Carbon\Carbon::parse($appointment->season)->format('H:i') }}</li>
                        <li><a href="{{ route('appointment.passed',compact('appointment')) }}"
                               class="btn btn-border hvr-bounce-to-right btn-theme-colored">Passed</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@stop