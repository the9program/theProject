@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-6">
                <div>
                    <span>full name:</span>
                    <strong>{{ $form->full_name }}</strong>
                </div>
                <div>
                    <span>gender</span>
                    <strong>{{ __('personal/gender.' . $form->gender) }}</strong>
                </div>

            </div>
            <div class="col-xs-6">
                <div>
                    <span>âge : </span>
                    <strong>{{ $age }} ans</strong>
                </div>
                <div>
                    <span>Mobile : </span>
                    <strong>{{ $form->mobile }}</strong>
                </div>

            </div>
        </div>
    </div>
@stop