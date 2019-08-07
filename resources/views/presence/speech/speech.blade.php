@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 mb-40">
                    <h4 class="text-primary title mt-0 pt-5">{{ __('validation.attributes.speech') }}</h4>
                    <hr>
                    <form method="POST" action="{{ '/speech/1' }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @include('layouts.textarea',[
                             'width' => "col-md-12",
                             'label' => ucfirst(__('validation.attributes.speech')) . '* :',
                             'name'  => "speech",
                             'value' => (old('speech')) ? old('speech') : $doctor->speech,
                             'attribute' => "required",
                         ])
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
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
    </section>
@endsection