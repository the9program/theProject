@extends('layouts.app')
@section('page-title')

@stop
@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            <form action="{{ route('phone.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    @include('layouts.input',[
                                        'width' => "col-md-12",
                                        'label' => ucfirst(__('validation.attributes.mobile')) . '* :',
                                        'type'  => "tel",
                                        'name'  => "mobile",
                                        'value' => old('mobile'),
                                        'attribute' => "required",
                                    ])
                                </div>
                                <div class="row">
                                    <div class="checkbox pull-left mt-15 ml-15">
                                        <label for="form_checkbox">
                                            <input id="form_checkbox" name="default" type="checkbox">
                                            {{ __('personal/mobile.default') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <button type="submit"
                                                class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                            <strong>{{ __('validation.attributes.create') }}</strong>
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
@stop