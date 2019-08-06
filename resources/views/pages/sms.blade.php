@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <form action="{{ route('verified.update',compact('verified')) }}" method="POST">
            @csrf
            <div class="row">

                @include('layouts.input',[
                    'width' => "col-md-6",
                    'label' => ' sms Code * :',
                    'type'  => "text",
                    'name'  => "sms",
                    'value' => old('sms'),
                    'attribute' => "required",
                ])

                <div class="form-group">
                    <button class="btn btn-dark btn-lg btn-block mt-15"
                            type="submit">{{ __('personal/register.register') }}
                    </button>
                </div>

            </div>
        </form>
    </div>
@stop