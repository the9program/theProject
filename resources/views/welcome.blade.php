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

    <!-- Section: team -->
    <section id="team">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">Our Doctors</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="{{ asset('images/title-icon.png') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                <div class="col-md-12">
                    <div class="owl-carousel-4col">
                        @foreach($list_doctors as $doctor)
                            <div class="item">
                                <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                    <div class="team-thumb">
                                        <img class="img-fullwidth" alt="" src="{{ asset('images/team/lg6.jpg') }}">
                                        <div class="team-overlay"></div>
                                    </div>
                                    <div class="team-details bg-silver-light pt-10 pb-10">
                                        <h4 class="text-uppercase font-weight-600 m-5">
                                            <a href="{{ route('doctor.show',['doctor' => $doctor->doctor]) }}">{{ $doctor->doctor->full_name }}</a>
                                        </h4>
                                        <h6 class="text-theme-colored font-15 font-weight-400 mt-0">{{ $doctor->doctor->specialty->specialty }}</h6>
                                        <h6 class="text-theme-colored font-15 font-weight-300 mt-0">{{ $doctor->doctor->phone }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Services -->
    <section class=" bg-lighter">
        <div class="container pb-20">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">Services</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="images/title-icon.png" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!
                        </p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="icon-box left media p-0"><a href="#" class="media-left pull-left"><i
                                        class="flaticon-medical-ambulance14 text-theme-colored"></i></a>
                            <div class="media-body">
                                <h5 class="media-heading heading">Emergency Care</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum consectetur sit ullam
                                    perspiciatis, deserunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="icon-box left media p-0"><a href="#" class="media-left pull-left"><i
                                        class="flaticon-medical-illness text-theme-colored"></i></a>
                            <div class="media-body">
                                <h5 class="media-heading heading">Operation Theatre</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum consectetur sit ullam
                                    perspiciatis, deserunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="icon-box left media p-0"><a href="#" class="media-left pull-left"><i
                                        class="flaticon-medical-stethoscope10 text-theme-colored"></i></a>
                            <div class="media-body">
                                <h5 class="media-heading heading">Outdoor Checkup</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum consectetur sit ullam
                                    perspiciatis, deserunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="icon-box left media p-0"><a href="#" class="media-left pull-left"><i
                                        class="flaticon-medical-medical51 text-theme-colored"></i></a>
                            <div class="media-body">
                                <h5 class="media-heading heading">Cancer Service</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum consectetur sit ullam
                                    perspiciatis, deserunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="icon-box left media p-0"><a href="#" class="media-left pull-left"><i
                                        class="flaticon-medical-hospital35 text-theme-colored"></i></a>
                            <div class="media-body">
                                <h5 class="media-heading heading">Blood Test</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum consectetur sit ullam
                                    perspiciatis, deserunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="icon-box left media p-0"><a href="#" class="media-left pull-left"><i
                                        class="flaticon-medical-tablets9 text-theme-colored"></i></a>
                            <div class="media-body">
                                <h5 class="media-heading heading">Pharmacy</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum consectetur sit ullam
                                    perspiciatis, deserunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: team -->
    @if(isset($list_clinics[0]))
        <section id="team">
            <div class="container">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-uppercase mt-0 line-height-1">Our Clinics</h2>
                            <div class="title-icon">
                                <img class="mb-10" src="{{ asset('images/title-icon.png') }}" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem
                                obcaecati!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mtli-row-clearfix">
                    <div class="col-md-12">
                        <div class="owl-carousel-4col">
                            @foreach($list_clinics as $clinical)
                                <div class="item">
                                    <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                        <div class="team-thumb">
                                            <img class="img-fullwidth" alt="" src="{{ asset('images/team/lg6.jpg') }}">
                                            <div class="team-overlay"></div>
                                        </div>
                                        <div class="team-details bg-silver-light pt-10 pb-10">
                                            <h4 class="text-uppercase font-weight-600 m-5">{{ $clinical->name }}</h4>
                                            <h6 class="text-theme-colored font-15 font-weight-400 mt-0">{{ $clinical->address->city }}</h6>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@stop