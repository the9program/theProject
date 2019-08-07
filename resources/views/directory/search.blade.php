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
                                               class="font-17 form-control">
                                    </div>
                                </div>
                                <div class="searching_bar col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                                    <div class="form-group">
                                        <select name="specialty" title="specialty"
                                                class="font-17 form-control select"
                                        >
                                            <option value="" selected="" disabled="">Specialité</option>
                                            @foreach($specialties as $specialty)
                                                <option value="{{ $specialty->specialty->id }}">{{ $specialty->specialty->specialty }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="searching_bar col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                                    <div class="form-group ">
                                        <select name="city" id="city" title="city"
                                                class="font-17 form-control select2-container select" style="min-height: 45px;">
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

    @if(isset($searches[0]))
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @foreach($searches as $search)
                            <div class="upcoming-events bg-white-f3 mb-20">
                                <div class="row">
                                    <div class="col-sm-4 pr-0 pr-sm-15">
                                        <div class="thumb p-15">
                                            <img class="img-fullwidth" src="{{ asset('images/doctor.jpg') }}"
                                                 title="{{ $search->full_name }}"
                                                 alt="{{ $search->full_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-0 pl-sm-15">
                                        <div class="event-details p-15 mt-20">
                                            <h4 class="media-heading text-uppercase font-weight-500">
                                                <a href="{{ route('doctor.show',['doctor' => $search->joint->doctor]) }}">{{ $search->full_name }}</a>
                                            </h4>
                                            <span class="text-muted">{{ __('personal/gender.' . $search->joint->doctor->gender) }}</span>
                                            <p>{{ $search->joint->doctor->phone }}</p>
                                            <p>{{ $search->specialty->specialty }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="event-count p-15 mt-15">
                                            <ul>
                                                <li class="text-theme-colored"><i class="fa fa-calendar mr-5"></i>
                                                    {{ \Carbon\Carbon::parse($search->joint->doctor->created_at)->format('d - m - y') }}
                                                </li>
                                                <li class="text-theme-colored"><i class="fa fa-map-marker mr-5"></i>
                                                    {{ $search->joint->doctor->address->full_address }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        pas de result
    @endif
@stop