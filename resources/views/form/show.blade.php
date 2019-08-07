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
                        <h2 class="title text-white">{{ __('validation.attributes.form') }}</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="/">{{ __('home') }}</a></li>
                            <li class="active text-gray-silver">{{ $form->full_name }}</li>
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
                        <div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-offset-3 col-md-6">
                            <div class="info p-20 bg-black-333">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="list angle-double-right m-0">
                                            <li class="text-gray-silver">
                                                <strong class="text-gray-lighter">
                                                    {{ ucfirst(__('validation.attributes.full_name')) }}
                                                </strong>
                                                <br> {{ $form->full_name }}
                                            </li>
                                            <li class="text-gray-silver">
                                                <strong class="text-gray-lighter">
                                                    {{ ucfirst(__('validation.attributes.gender')) }}
                                                </strong>
                                                <br> {{ __('personal/gender.' . $form->gender) }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="list angle-double-right m-0">
                                            <li class="text-gray-silver">
                                                <strong class="text-gray-lighter">
                                                    {{ ucfirst(__('validation.attributes.age')) }}
                                                </strong>
                                                <br> {{ $age . ' ' .  __('validation.attributes.ans') }}
                                            </li>
                                            <li class="text-gray-silver">
                                                <strong class="text-gray-lighter">
                                                    {{ ucfirst(__('validation.attributes.mobile')) }}
                                                </strong>
                                                <br> {{ $form->mobile }}
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