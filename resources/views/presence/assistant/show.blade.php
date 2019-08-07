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
                        <h2 class="title text-white">{{ __('presence/assistant.assistant') }}</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="/">{{ __('home') }}</a></li>
                            <li class="active text-gray-silver">{{ $assistant->real->full_name }}</li>
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
                    <div class="col-xs-12 text-right">
                        <a href="#"
                           class="btn btn-danger btn-outline-danger"
                           onclick="event.preventDefault();
                                document.getElementById('detach-assistant').submit();"
                        >{{ __('presence/assistant.detach') }}</a>
                        <form id="detach-assistant"
                              action="{{ route('assistant.destroy',compact('assistant')) }}"
                              method="POST"
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-12">
                        <div class="col-xs-12 col-sm-4 col-md-6">
                            <div class="info p-20 bg-black-333">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="doctor-thumb">
                                            <img src="{{ ($assistant->avatar) ? asset('storage/' . $assistant->avatar) : asset('images/placeholder.png') }}"
                                                 alt="">
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="text-uppercase text-white">{{ $assistant->real->full_name }}</h4>
                                        <p class="text-gray-silver">{{ __('personal/gender.' . $assistant->real->gender) }}</p>
                                        <p class="text-gray-silver">{{ date_diff(date_create($assistant->real->birth), now())->y }} ans</p>
                                        <ul class="list angle-double-right m-0">
                                            @if($assistant->real->default_address)
                                                <li class="mt-0 text-gray-silver"><strong
                                                            class="text-gray-lighter">{{ __('validation.attributes.address') }}</strong><br> {{ $assistant->real->default_address }}
                                                </li>
                                            @endif
                                            <li class="text-gray-silver"><strong
                                                        class="text-gray-lighter">{{ ucfirst(__('validation.attributes.mobile')) }}</strong><br> {{ $assistant->real->default_mobile }}
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop