@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <form action="{{ route('availability.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        @include('layouts.input',[
                           'width' => "col-xs-12",
                           'label' => ucfirst(__('validation.attributes.day')) . '* :',
                           'type'  => "date",
                           'name'  => "day",
                           'value' => old('day'),
                           'attribute' => "required",
                       ])
                    </div>
                    <div class="row">
                        @include('layouts.input',[
                           'width' => "col-xs-6",
                           'label' => ucfirst(__('validation.attributes.from')) . '* :',
                           'type'  => "time",
                           'name'  => "from",
                           'value' => old('from'),
                           'attribute' => "required",
                       ])
                        @include('layouts.input',[
                           'width' => "col-xs-6",
                           'label' => ucfirst(__('validation.attributes.to')) . '* :',
                           'type'  => "time",
                           'name'  => "to",
                           'value' => old('to'),
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