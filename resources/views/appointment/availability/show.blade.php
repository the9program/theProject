@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <ul>
                @foreach($appointments as $appointment)
                    @if(!$appointment->form_id && !$appointment->user_id)
                        <li>{{ $appointment->season }}</li>
                        <li><a href="{{ route('appointment.edit',compact('appointment')) }}">edit</a></li>
                    @elseif(!$appointment->passed)
                        <li>{{ $appointment->season }}</li>
                        <li><a href="{{ route('appointment.passed',compact('appointment')) }}">Passed</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@stop