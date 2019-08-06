@extends('layouts.app')
@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
             data-bg-img="{{ asset('images/bg/bg3.jpg') }}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white">{{ __('personal/real.profile') }}</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="/">{{ __('home') }}</a></li>
                            <li class="active text-gray-silver">{{ $user->real->full_name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Doctor Details -->
    <section class="">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-12">
                        <div class="col-xs-12 col-sm-4 col-md-6">
                            <div class="info p-20 bg-black-333">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="doctor-thumb">
                                            <img src="{{ ($user->avatar) ? asset('storage/' . $user->avatar) : asset('images/placeholder.png') }}"
                                                 alt="">
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="text-uppercase text-white">{{ $user->real->full_name }}</h4>
                                        <p class="text-gray-silver">{{ __('personal/gender.' . $user->real->gender) }}</p>
                                        <p class="text-gray-silver">{{ date_diff(date_create($user->real->birth), now())->y }} ans</p>
                                        <ul class="list angle-double-right m-0">
                                            @if($user->real->default_address)
                                                <li class="mt-0 text-gray-silver"><strong
                                                            class="text-gray-lighter">{{ __('validation.attributes.address') }}</strong><br> {{ $user->real->default_address }}
                                                </li>
                                            @endif
                                            <li class="text-gray-silver"><strong
                                                        class="text-gray-lighter">{{ ucfirst(__('validation.attributes.mobile')) }}</strong><br> {{ $user->real->default_mobile }}
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#orders" aria-controls="orders"
                                       role="tab" data-toggle="tab"
                                       class="font-15 text-uppercase">{{ __('validation.attributes.appointment_list') }}
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#free-orders" aria-controls="free-orders" role="tab"
                                       data-toggle="tab" class="font-15 text-uppercase">{{ __('validation.attributes.passed_list') }}
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="orders">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>{{ __('validation.attributes.date') }}</th>
                                                <th>{{ __('validation.attributes.season') }}</th>
                                                <th>{{ __('validation.attributes.doctor') }}</th>
                                                <th>{{ __('validation.attributes.address') }}</th>
                                                <th>{{ __('validation.attributes.mobile') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($appointments as $appointment)
                                                @if(!$appointment->passed)
                                                    <tr>
                                                        <th scope="row">{{ \Carbon\Carbon::parse($appointment->availability->from)->format('d-m-Y') }}</th>
                                                        <td>{{ \Carbon\Carbon::parse($appointment->season)->format('H:i')  }}</td>
                                                        <td>{{ $appointment->availability->joint->doctor->full_name}}</td>
                                                        <td>{{ $appointment->availability->joint->doctor->address->full_address}}</td>
                                                        <td><a class="btn btn-success btn-xs"
                                                               href="#">{{ $appointment->availability->joint->doctor->phone}}</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="free-orders">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>{{ __('validation.attributes.date') }}</th>
                                            <th>{{ __('validation.attributes.season') }}</th>
                                            <th>{{ __('validation.attributes.doctor') }}</th>
                                            <th>{{ __('validation.attributes.address') }}</th>
                                            <th>{{ __('validation.attributes.mobile') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appointments as $appointment)
                                            @if($appointment->passed)
                                                <tr>
                                                    <th scope="row">{{ \Carbon\Carbon::parse($appointment->availability->from)->format('d-m-Y') }}</th>
                                                    <td>{{  \Carbon\Carbon::parse($appointment->season)->format('H:i')   }}</td>
                                                    <td>{{ $appointment->availability->joint->doctor->full_name}}</td>
                                                    <td>{{ $appointment->availability->joint->doctor->address->full_address}}</td>
                                                    <td><a class="btn btn-success btn-xs"
                                                           href="#">{{ $appointment->availability->joint->doctor->phone}}</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop