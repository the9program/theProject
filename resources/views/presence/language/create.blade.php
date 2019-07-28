@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                    <form name="reg-form" action="{{ route('languages.store') }}" method="POST">
                        @csrf
                        @foreach($languages as $language)
                            <div class="col-md-6">
                                <div class="checkbox pull-left ml-15 mt-15">
                                    <label for="{{ $language->id }}">
                                        <input id="{{ $language->id }}" name="language[{{$language->id}}]"
                                               {{ ($language->doctors()->where('doctors.id',auth()->user()->doctor->id)->first()) ? 'checked' : '' }} type="checkbox">
                                        {{ $language->language }}
                                    </label>
                                </div>
                            </div>
                    @endforeach
                    <!-- Submit -->
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button type="submit"
                                        class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                    <strong>{{ __('validation.attributes.create') }}</strong>
                                </button>
                            </div>
                        </div>
                        <!-- \Submit -->
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop