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
                        <h2 class="title">{{ $doctor->full_name }}</h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <li><a href="{{ route('doctor.index') }}">{{ __('directory/doctor.doctors') }}</a></li>
                            <li class="active text-theme-colored">{{ $doctor->full_name }}</li>
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
                    <a href="{{ route('doctor.edit',compact('doctor')) }}"
                       class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                    >{{ __('directory/doctor.update') }}</a>
                    <a href="{{ route('doctor.register.create',compact('doctor')) }}"
                       class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                    >{{ __('directory/doctor.create') }}</a>
                    <a href="{{ route('doctor.edit',compact('doctor')) }}"
                       class="btn btn-border hvr-bounce-to-right btn-danger"
                       onclick="event.preventDefault();
                       document.getElementById('delete-doctor').submit();"
                    >{{ __('directory/doctor.delete') }}</a>
                    <form id="delete-doctor" action="{{ route('doctor.destroy',compact('doctor')) }}" method="POST"
                          style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="upcoming-events bg-white-f3 mb-20">
                        <div class="row">
                            <div class="col-sm-4 pr-0 pr-sm-15">
                                <div class="thumb p-15">
                                    <img class="img-fullwidth" src="{{ asset('images/doctor.jpg') }}"
                                         title="{{ $doctor->full_name }}"
                                         alt="{{ $doctor->full_name }}">
                                </div>
                            </div>
                            <div class="col-sm-4 pl-0 pl-sm-15">
                                <div class="event-details p-15 mt-20">
                                    <h4 class="media-heading text-uppercase font-weight-500">{{ $doctor->full_name }}</h4>
                                    <span class="text-muted">{{ __('personal/gender.' . $doctor->gender) }}</span>
                                    <p>{{ $doctor->phone }}</p>
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
                                            {{ $doctor->address->full_address }}
                                        </li>

                                        @can('create',\App\Doctor::class)
                                            <li class="text-theme-colored">
                                                <hr>
                                                {!! __('validation.attributes.created_by') . ' : <br>
                                                <i class="fa fa-user mr-5"></i>'
                                                . $doctor->creator->real->full_name !!}
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop