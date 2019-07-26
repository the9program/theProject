@extends('layouts.app')
@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg') }}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white">{{ __('personal/real.profile') }}</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="/">Home</a></li>
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
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        <div class="doctor-thumb col-xs-12 mt-10">
                            <img src="{{ ($user->avatar) ? asset('storage/' . $user->avatar)  : asset('images/placeholder.png') }}"
                                 class="col-xs-6 col-xs-offset-3" alt="">
                        </div>
                        <div class="info p-20 bg-black-333">
                            <h4 class="text-uppercase text-white">{{ $user->real->full_name }}</h4>
                            <ul class="list angle-double-right m-0">
                                <li class="mt-0 text-gray-silver"><strong
                                            class="text-gray-lighter">{{ ucfirst(__('validation.attributes.email')) }}</strong><br> {{ $user->email }}
                                </li>
                                <li class="text-gray-silver"><strong
                                            class="text-gray-lighter">{{ __('validation.attributes.gender') }}</strong><br> {{ ($user->real->gender) ? 'Homme' : 'Femme' }}
                                </li>
                                <li class="text-gray-silver"><strong
                                            class="text-gray-lighter">{{ __('validation.attributes.age') }}</strong><br> {{Carbon\Carbon::parse($user->real->birth)->diff(now())->y}}
                                </li>
                                @foreach($user->real->addresses as $address)
                                    <li class="text-gray-silver"><strong
                                                class="text-gray-lighter">{{ __('validation.attributes.address') }}</strong><br> {{ $address->full_address }}
                                    </li>
                                @endforeach
                                @foreach($user->real->phones as $phone)
                                    <li class="text-gray-silver"><strong
                                                class="text-gray-lighter">{{ __('validation.attributes.mobile') }}</strong><br> {{ $phone->phone }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@stop