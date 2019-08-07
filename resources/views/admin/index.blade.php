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
                            <li class="active text-theme-colored">{{ __('personal/admin.admins') }}</li>
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
            </div>
            <div class="row">
                @if(isset($admins[0]))
                    <div class="col-md-8 col-md-offset-2">
                        @foreach($admins as $admin)
                            <div class="upcoming-events bg-white-f3 mb-20">
                                <div class="row">
                                    <div class="col-sm-4 pr-0 pr-sm-15">
                                        <div class="thumb p-15">
                                            <img class="img-fullwidth" src="{{ asset('images/doctor.jpg') }}"
                                                 title="{{ $admin->real->full_name }}"
                                                 alt="{{ $admin->real->full_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-0 pl-sm-15">
                                        <div class="event-details p-15 mt-20">
                                            <h4 class="media-heading text-uppercase font-weight-500">
                                                <a href="{{ route('admin.show',compact('admin')) }}">{{ $admin->real->full_name }}</a>
                                            </h4>
                                            <span class="text-muted">{{ ($admin->real->gender) ? 'Homme' : 'femme' }}</span>

                                            @if(isset($admin->real->phones[0]))
                                                <p>{{ $admin->real->phones[0]->phone }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="event-count p-15 mt-15">
                                            <ul>
                                                <li class="text-theme-colored"><i class="fa fa-calendar mr-5"></i>
                                                    {{ \Carbon\Carbon::parse($admin->created_at)->format('d - m - y') }}
                                                </li>
                                                @if(isset($admin->real->addresses[0]))
                                                    <li class="text-theme-colored"><i class="fa fa-map-marker mr-5"></i>
                                                        {{ $admin->real->addresses[0]->full_address }}
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

@stop