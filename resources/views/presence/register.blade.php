@extends('layouts.app')
@section('content')

    <section class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5">{{ __('personal/security.update_psw') }}</h3>
                        <hr>

                        <blockquote>
                            <p class="font-13">blockquote psw msg</p>
                        </blockquote>
                        <form method="POST" action="{{ route('presence.register',compact('doctor')) }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                @include('layouts.input',[
                                   'width' => "col-xs-12",
                                   'label' => ucfirst(__('validation.attributes.mobile')) . '* :',
                                   'type'  => "tel",
                                   'name'  => "mobile",
                                   'value' => old('mobile'),
                                   'attribute' => "required",
                               ])
                            </div>
                            <div class="row">
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => ucfirst(__('validation.attributes.birth')) . '* :',
                                    'type'  => "date",
                                    'name'  => "birth",
                                    'value' => old('birth'),
                                    'attribute' => "required",
                                ])
                                @include('layouts.gender',[
                                         'width' => "col-md-6",
                                         'label' => ucfirst(__('validation.attributes.gender')) . '* :',
                                         'name'  => "gender",
                                         'value' => old('gender'),
                                         'attribute' => "required",
                                     ])
                            </div>
                            <div class="row">
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('validation.attributes.password')) . '* :',
                                      'type'  => "password",
                                      'name'  => "password",
                                      'value' => null,
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('validation.attributes.password_confirmation')) . '* :',
                                      'type'  => "password",
                                      'name'  => "password_confirmation",
                                      'value' => null,
                                      'attribute' => "required",
                                  ])
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-border hvr-icon-forward btn-theme-colored col-xs-12">
                                        <strong>{{ __('validation.attributes.create') }}</strong>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop