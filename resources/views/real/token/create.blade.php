@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            <form action="{{ route('token.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    @include('layouts.input',[
                                        'width' => "col-md-12",
                                        'label' => ucfirst(__('validation.attributes.email')) . '* :',
                                        'type'  => "email",
                                        'name'  => "email",
                                        'value' => old('eamil'),
                                        'attribute' => "required",
                                    ])
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group {{ ($errors->has('category')) ? 'has-error' : ""}}">

                                            <label for="category"
                                                   class="control-label">{{ __('validation.attributes.category') }}</label>
                                            <select name="category" id="category" class="form-control border-dark" required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach
                                            </select>

                                            @if($errors->has( 'category' ))
                                                <div class="alert alert-danger mt-5" role="alert">
                                                    <span class="text-danger">{{ $errors->first( 'category' ) }}</span>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <button type="submit"
                                                class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                            <strong>{{ __('validation.attributes.create') }}</strong>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop