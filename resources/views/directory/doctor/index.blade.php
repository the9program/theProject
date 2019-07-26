@extends('layouts.app')
@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8"
             data-bg-img="{{ asset('images/bg/bg6.jpg') }}">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{ __('directory/doctor.doctors') }}</h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <li class="active text-theme-colored">{{ __('directory/doctor.doctors') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Event List -->
    <section>
        <div class="container">
            <div class="row mb-30">
                <div class="col-xs-12 text-right">
                    <a href="{{ route('doctor.create') }}"
                       class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                    >{{ __('directory/doctor.create') }}</a>
                </div>
            </div>
            <div class="row">
                @if(isset($doctors[0]))
                    <div class="col-md-8 col-md-offset-2">
                        @foreach($doctors as $doctor)
                            <div class="upcoming-events bg-white-f3 mb-20">
                                <div class="row">
                                    <div class="col-sm-4 pr-0 pr-sm-15">
                                        <div class="thumb p-15">
                                            <img class="img-fullwidth" src="{{ asset('images/doctor.jpg') }}"
                                                 title="{{ $doctor->real->full_name }}"
                                                 alt="{{ $doctor->real->full_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-0 pl-sm-15">
                                        <div class="event-details p-15 mt-20">
                                            <h4 class="media-heading text-uppercase font-weight-500">
                                                <a href="{{ route('doctor.show',compact('doctor')) }}">{{ $doctor->real->full_name }}</a></h4>
                                            <span class="text-muted">{{ ($doctor->real->gender) ? 'Homme' : 'femme' }}</span>
                                            <p>{{ $doctor->real->phones[0]->phone }}</p>
                                            <p>{{ $doctor->specialty->specialty }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="event-count p-15 mt-15">
                                            <ul>
                                                <li class="text-theme-colored"><i class="fa fa-calendar mr-5"></i>
                                                    {{ \Carbon\Carbon::parse($doctor->created_at)->format('d - m - y') }}
                                                </li>
                                                <li class="text-theme-colored"><i class="fa fa-map-marker mr-5"></i>
                                                    {{ $doctor->real->addresses[0]->full_address }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-sm-12">
                                <nav class="theme-colored pull-right xs-pull-center mb-xs-40">
                                    {{ $doctors->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@stop