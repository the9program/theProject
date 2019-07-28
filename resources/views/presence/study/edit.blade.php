@extends('layouts.app')

@section('content')

    <section class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5">{{ __('personal/security.update_psw') }}</h3>
                        <hr>

                        <blockquote>
                            <p class="font-13">{{ __('personal/security.blockquote_psw') }}</p>
                        </blockquote>
                        <form method="POST" action="{{ route('study.update',compact('study')) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('validation.attributes.title')) . '* :',
                                      'type'  => "text",
                                      'name'  => "title",
                                      'value' => (old('title')) ? old('title') : $study->title,
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('establishment')) . '* :',
                                      'type'  => "text",
                                      'name'  => "establishment",
                                      'value' => (old('establishment')) ? old('establishment') : $study->establishment,
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('from')) . '* :',
                                      'type'  => "date",
                                      'name'  => "from",
                                      'value' => (old('from')) ? old('from') : $study->from,
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('to')) . '* :',
                                      'type'  => "date",
                                      'name'  => "to",
                                      'value' => (old('to')) ? old('to') : $study->to,
                                      'attribute' => "",
                                  ])
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-border hvr-icon-forward btn-theme-colored col-xs-12">
                                        <strong>{{ __('validation.attributes.update') }}</strong>
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