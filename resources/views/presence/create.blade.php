@extends('layouts.app')
@section('content')
    <section class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5">email</h3>
                        <hr>

                        <blockquote>
                            <p class="font-13">block quote msg</p>
                        </blockquote>
                        <form method="POST">
                            @csrf
                            <div class="row">
                                @include('layouts.input',[
                                      'width' => "col-md-12",
                                      'label' => ucfirst(__('validation.attributes.email')) . '* :',
                                      'type'  => "email",
                                      'name'  => "email",
                                      'value' => old('email'),
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