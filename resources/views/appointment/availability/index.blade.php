@extends('layouts.app')
@section('page-title')

@stop
@section('content')
    <!-- divider: what makes us different -->
    <section class="divider parallax layer-overlay overlay-white-9" data-parallax-ratio="0.7" data-bg-img="{{ asset('images/bg/bg2.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="row mb-30">
                    <div class="col-xs-12 text-right">
                        <a href="{{ route('availability.create') }}"
                           class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                        >{{ __('validation.attributes.create') }}</a>
                    </div>
                </div>
            </div>
            <div class="section-content text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div id='full-event-calendar'></div>
                        <!-- JS | Calendar Event Data -->
                        <script src="{{ asset('js/fullcalendar.js') }}"></script>
                        <script src="{{ asset('js/locale-all.js') }}"></script>
                        <script>
                            var calendarEvents= [
                                {!! $availabilities !!}
                            ];
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->
@stop