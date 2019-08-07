@extends('layouts.app')

@section('content')

    <section class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5">{{ __('presence/study.study') }}</h3>
                        <hr>
                        <form method="POST" action="{{ route('study.store',compact('study')) }}">
                            @csrf
                            <div class="row">
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('validation.attributes.title')) . '* :',
                                      'type'  => "text",
                                      'name'  => "title",
                                      'value' => old('title'),
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('validation.attributes.faculty')) . '* :',
                                      'type'  => "text",
                                      'name'  => "establishment",
                                      'value' => old('establishment'),
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('validation.attributes.from')) . '* :',
                                      'type'  => "date",
                                      'name'  => "from",
                                      'value' => old('from'),
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-6",
                                      'label' => ucfirst(__('validation.attributes.to')) . '* :',
                                      'type'  => "date",
                                      'name'  => "to",
                                      'value' => old('to'),
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