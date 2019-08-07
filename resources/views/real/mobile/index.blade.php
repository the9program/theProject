@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <div class="row mb-15">
                        <div class="col-xs-12">
                            <div class="col-xs-12 text-right">
                                <button class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                    <a href="{{ route('phone.create') }}"><strong>{{ __('personal/mobile.add') }}</strong></a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <tr>
                                <th class="text-center">{{ __("validation.attributes.mobile") }}</th>
                                <th class="text-center" colspan="2">{{ __('validation.attributes.action') }}</th>
                            </tr>
                            @foreach($mobiles as $phone)
                                <tr class="{{ ($phone->default) ? 'info' : '' }}">
                                    <td class="text-center">{{ $phone->phone }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('phone.edit',compact('phone')) }}" class="text-primary">{{ __('validation.attributes.edit') }}</a>
                                    </td>
                                    <td class="text-center">
                                        @if(!$phone->default)
                                            <a href="#" class="text-danger" onclick="event.preventDefault();
                                                    document.getElementById('{{ 'delete-' . $phone->id }}').submit();">
                                                {{ __('validation.attributes.delete') }}
                                            </a>
                                            <form id="delete-{{ $phone->id }}"
                                                  action="{{ route('phone.destroy',compact('phone')) }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop