<section>
    <div class="container pb-0">
        <div class="row text-center">
            @foreach($appointments as $appointment)
                @if(!$appointment->passed)
                <div class="col-sm-4">
                    @if($appointment->form_id)
                        <div class="icon-box iconbox-border iconbox-theme-colored p-40 bg-gray-gainsboro">
                            @elseif($appointment->arrived)
                                <div class="icon-box iconbox-border iconbox-theme-colored p-40 bg-success">
                                    @elseif($appointment->user_id)
                                        <div class="icon-box iconbox-border iconbox-theme-colored p-40 bg-dark-transparent-4">
                                            @else
                                                <div class="icon-box iconbox-border iconbox-theme-colored p-40">
                                                    @endif
                                                    <a href="#"
                                                       class="icon icon-gray icon-bordered icon-border-effect effect-flat">
                                                        <i class="pe-7s-users"></i>
                                                    </a>
                                                    @if($appointment->form_id)
                                                        <p class="text-gray">{{ $appointment->form->full_name }}</p>
                                                    @elseif($appointment->user_id)
                                                        <p class="text-gray">{{ $appointment->user->real->full_name }}</p>
                                                    @else
                                                        <hr>
                                                    @endif
                                                    <h5 class="icon-box-title">{{ \Carbon\Carbon::parse($appointment->season)->format('H:i') }}</h5>

                                                    @if(!$appointment->form_id && !$appointment->user_id)
                                                        <a class="btn btn-dark btn-sm mt-15"
                                                           href="{{ route('appointment.edit',compact('appointment')) }}">Add</a>
                                                    @endif
                                                    @if(($appointment->form_id || $appointment->user_id) && !$appointment->arrived)
                                                        <a class="btn btn-dark btn-sm mt-15" href="{{ route('appointment.arrived',compact('appointment')) }}">Arrived</a>
                                                        <a class="btn btn-dark btn-sm mt-15" href="{{ route('appointment.ghost',compact('appointment')) }}">ghost</a>
                                                    @endif
                                                    @if(!$appointment->passed && $appointment->arrived)
                                                        <a class="btn btn-dark btn-sm mt-15" href="{{ route('appointment.passed',compact('appointment')) }}">Passed</a>
                                                        <a class="btn btn-dark btn-sm mt-15" href="{{ route('appointment.ghost',compact('appointment')) }}">ghost</a>
                                                    @endif
                                                    @if($loop->index != 0 && $appointment->arrived)
                                                        <a class="btn btn-dark btn-sm mt-15" href="{{ route('appointment.first',compact('appointment')) }}">first</a>
                                                    @endif
                                                </div>
                                        </div>
                                    @endif
                                        @endforeach
                                </div>
                        </div>
</section>