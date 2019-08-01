@extends('layouts.app')
@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-8"
             data-bg-img="{{ asset('images/bg/bg1.jpg') }}"
             style="background-image: url({{asset('images/bg/bg1.jpg')}}); background-position: 50% 42px;">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-xs-12 xs-text-center">
                        <div class="text-white font-22 font-weight-600">Prenez rendez-vous en ligne chez un
                            professionnel de santé
                        </div>
                        <div class="text-white font-13 mt-11 mb-10">C'est immédiat, simple et gratuit.</div>
                        <div class="row">
                            <form action="{{ route('search.post') }}" method="POST">
                                @csrf

                                <div class="searching_bar col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                                    <div class="form-group">
                                        <input type="text" name="doctor" title="doctor" placeholder="Docteur"
                                               class="font-17 form-control required valid">
                                    </div>
                                </div>
                                <div class="searching_bar col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                                    <div class="form-group ">
                                        <select name="specialty" title="specialty"
                                                class="font-17 form-control required valid"
                                        >
                                            <option value="" selected="" disabled="">Specialité</option>
                                            @foreach($specialties as $specialty)
                                                <option value="{{ $specialty->specialty->id }}">{{ $specialty->specialty->specialty }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="searching_bar col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                                    <div class="form-group">
                                        <select name="city" id="city" title="city"
                                                class="font-17 form-control required valid"
                                        >
                                            <option value="" selected="" disabled="">Ville</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->city->id }}">{{ $city->city->city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="searching_bar col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                                    <div class="form-group">
                                        <button type="submit"
                                                class="sbmt btn color-init-3 text-white font-weight-600 font-18 btn-block">
                                            RECHERCHE
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-theme-colored-9"
             data-bg-img="{{ asset('images/bg/bg2.jpg') }}" data-parallax-ratio="0.7">
        <div class="container pt-60 pb-60">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-smile mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $users }}"
                            class="animate-number text-white font-42 font-weight-500">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">Happy Patients</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-rocket mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $services }}"
                            class="animate-number text-white font-42 font-weight-500">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">Our Services</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-add-user mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $doctors }}"
                            class="animate-number text-white font-42 font-weight-500">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">Our Doctors</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-global mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $joints }}"
                            class="animate-number text-white font-42 font-weight-500">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">Service Points</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop