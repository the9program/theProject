@extends('layouts.app')
@section('content')

    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-11 col-md-offset-1">
                    <form name="reg-form" action="{{ route('doctor.store') }}" method="POST">
                        @csrf

                        <!-- first last name -->
                        <div class="row">
                            @include('layouts.input',[
                                'width' => "col-md-6",
                                'label' => ucfirst(__('validation.attributes.last_name')) . '* :',
                                'type'  => "text",
                                'name'  => "last_name",
                                'value' => old('last_name'),
                                'attribute' => "required",
                            ])
                            @include('layouts.input',[
                                'width' => "col-md-6",
                                'label' => ucfirst(__('validation.attributes.first_name')) . '* :',
                                'type'  => "text",
                                'name'  => "first_name",
                                'value' => old('first_name'),
                                'attribute' => "required",
                            ])
                        </div>
                        <!-- \first last name -->

                        <!-- gender and mobile -->
                        <div class="row">
                            @include('layouts.gender',[
                                'width' => "col-md-6",
                                'label' => ucfirst(__('validation.attributes.gender')) . '* :',
                                'name'  => "gender",
                                'value' => old('gender'),
                                'attribute' => "required",
                            ])
                            @include('layouts.input',[
                                 'width' => "col-md-6",
                                 'label' => ucfirst(__('validation.attributes.mobile')) . '* :',
                                 'type'  => "tel",
                                 'name'  => "mobile",
                                 'value' => old('mobile'),
                                 'attribute' => "required",
                             ])
                        </div>
                        <!-- \gender and mobile -->

                        <!-- Address -->
                        <div class="row">
                            @include('layouts.input',[
                            'width' => "col-md-12",
                            'label' => ucfirst(__('validation.attributes.address')) . '* :',
                            'type'  => "text",
                            'name'  => "address",
                            'value' => old('address'),
                            'attribute' => "required",
                        ])
                        </div>
                        <div class="row">
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.build')) . '* :',
                            'type'  => "number",
                            'name'  => "build",
                            'value' => old('build'),
                            'attribute' => "required",
                        ])
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.floor')) . ' :',
                            'type'  => "number",
                            'name'  => "floor",
                            'value' => old('floor'),
                            'attribute' => "",
                        ])
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.apt_nbr')) . ' :',
                            'type'  => "number",
                            'name'  => "apt_nbr",
                            'value' => old('apt_nbr'),
                            'attribute' => "",
                        ])

                        </div>
                        <div class="row">
                            @include('layouts.input',[
                            'width' => "col-md-6",
                            'label' => ucfirst(__('validation.attributes.zip')) . ' :',
                            'type'  => "number",
                            'name'  => "zip",
                            'value' => old('zip'),
                            'attribute' => "",
                        ])
                            @include('layouts.city',[
                            'width' => "col-md-6",
                        ])
                        </div>
                        <!-- \Address -->

                        <!-- specialty -->
                        <div class="row">
                            @include('layouts.specialty',[
                            'width'     => 'col-md-12',
                            ])
                        </div>
                        <!-- \specialty -->

                        <!-- Submit -->
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button type="submit"
                                        class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                    <strong>{{ __('validation.attributes.create') }}</strong>
                                </button>
                            </div>
                        </div>
                        <!-- \Submit -->
                    </form>
                </div>

            </div>
        </div>
    </section>
@stop