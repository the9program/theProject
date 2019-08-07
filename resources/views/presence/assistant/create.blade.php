@extends('layouts.app')
@section('content')
    <section class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5">{{ __('presence/assistant.assistant') }}</h3>
                        <hr>
                        <form action="{{ route('assistant.store') }}" method="POST">
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
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('validation.attributes.email')) . '* :',
                                      'type'  => "email",
                                      'name'  => "email",
                                      'value' => old('email'),
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                    'width' => "col-xs-6",
                                    'label' => ucfirst(__('validation.attributes.mobile')) . '* :',
                                    'type'  => "tel",
                                    'name'  => "mobile",
                                    'value' => old('mobile'),
                                    'attribute' => "required",
                                ])

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-border hvr-icon-forward btn-theme-colored col-xs-12">
                                        <strong>{{ __('validation.attributes.send') }}</strong>
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