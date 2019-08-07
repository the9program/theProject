@extends('layouts.app')
@section('content')

    <section>
        <div class="container">
            <div class="row">

                <form method="POST" action="{{ route('form.syn',compact('appointment')) }}">
                    @csrf
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
                            'label' => ucfirst(__('validation.attributes.birth')) . '* :',
                            'type'  => "date",
                            'name'  => "birth",
                            'value' => old('birth'),
                            'attribute' => "required",
                        ])
                    </div>

                    <div class="row">
                        <!-- PHONES -->

                        @include('layouts.input',[
                            'width' => "col-xs-12",
                            'label' => ucfirst(__('validation.attributes.mobile')) . '* :',
                            'type'  => "tel",
                            'name'  => "mobile",
                            'value' => old('mobile'),
                            'attribute' => "required",
                        ])
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark btn-lg btn-block mt-15"
                                type="submit">{{ __('personal/register.register') }}
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </section>
@stop