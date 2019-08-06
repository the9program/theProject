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
                    @can('update',$doctor)
                        <a href="{{ route('doctor.edit',compact('doctor')) }}"
                           class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                        >{{ __('directory/doctor.update') }}</a>
                    @endcan
                    @can('presence',$doctor)
                        @if(!isset($doctor->user->real))
                            <a href="{{ route('doctor.register.create',compact('doctor')) }}"
                               class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                            >Marquez la presence</a>
                        @endif
                    @endcan
                    @can('premium',$doctor)
                        @if(isset($doctor->user->real) && (!$doctor->premium))
                            <a href="#"
                               class="btn btn-success btn-outline-success"
                               onclick="event.preventDefault();
                                document.getElementById('activate-premium').submit();"
                            >Activer le système de RDV</a>
                            <form id="activate-premium" action="{{ route('appointment.activate',compact('doctor')) }}"
                                  method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        @elseif(isset($doctor->user->real) && ($doctor->premium))
                            <a href="#"
                               class="btn btn-warning btn-outline-warning"
                               onclick="event.preventDefault();
                                document.getElementById('inactivate-premium').submit();"
                            >Désactiver le système RDV</a>
                            <form id="inactivate-premium"
                                  action="{{ route('appointment.inactivate',compact('doctor')) }}"
                                  method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        @endif
                    @endcan
                    @can('delete',$doctor)
                        <a href="#"
                           class="btn btn-danger btn-outline-danger"
                           onclick="event.preventDefault();
                       document.getElementById('delete-doctor').submit();"
                        >{{ __('directory/doctor.delete') }}</a>
                        <form id="delete-doctor" action="{{ route('doctor.destroy',compact('doctor')) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endcan
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

    @if($doctor->premium)
        @if(isset($availabilities[0]))
            <!-- Divider: Appoinment Form -->
            <section data-bg-img="{{ asset('images/pattern/p4.png') }}">
                <div class="container pt-50 pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-10">
                                <!-- Reservation Form Start-->
                                <form id="reservation_form" name="reservation_form" class="reservation-form"
                                      method="post"
                                      action="{{ route('appointment.post') }}">
                                    @csrf
                                    <h2 class="mt-0 line-bottom line-height-1 text-black mb-30">Make An Appoinment<span
                                                class="text-theme-colored font-weight-600"> Now!</span></h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-30">
                                                <div class="styled-select">
                                                    <select id="availability" name="availability" class="form-control"
                                                            required="">
                                                        <option value disabled selected>- Select DATE -</option>
                                                        @foreach($availabilities as $availability)
                                                            <option value="{{ $availability }}">{{ $availability }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="styled-select pt-15" id="ap">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mb-0 mt-0">
                                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                                <button type="submit" class="btn btn-theme-colored btn-lg btn-block"
                                                        data-loading-text="Please wait...">Submit Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Reservation Form End-->
                                <script>
                                    $(document).ready(function () {
                                        $('body').on('change', '#availability', function () {
                                            var availability = $(this).val();
                                            var _token = $("meta[name=csrf-token]").attr('content');

                                            $.ajax({
                                                url: "/availability/appointment",
                                                type: 'POST',
                                                data: {availability: availability, _token: _token},
                                                datatype: 'json',
                                                success: function (data) {
                                                    $('#ap').html(data)
                                                    console.log('success')
                                                },
                                                error: function (data) {
                                                    console.log('lkjl')
                                                },
                                                beforeSend: function (data) {

                                                },
                                                complete: function (data) {
                                                    console.log('5454');
                                                }
                                            })
                                        });
                                    })
                                </script>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/about/4.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif

@stop