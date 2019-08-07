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
                                    <a href="{{ route('token.create') }}">
                                        <strong>{{ __('personal/token.add') }}</strong>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <tr>
                                <th class="text-center">{{ __("validation.attributes.token") }}</th>
                                <th class="text-center">{{ __("validation.attributes.email") }}</th>
                                <th class="text-center">{{ __("validation.attributes.category") }}</th>
                                <th class="text-center" colspan="2">{{ __('validation.attributes.action') }}</th>
                            </tr>
                            @if(isset($tokens[0]))
                                @foreach($tokens as $token)
                                    <tr>
                                        <td class="text-center">{{ $token->token }}</td>
                                        <td class="text-center">{{ $token->email }}</td>
                                        <td class="text-center">{{ $token->category->category }}</td>
                                        <td class="text-center">
                                            <a href="#" class="text-danger" onclick="event.preventDefault();
                                                    document.getElementById('{{ 'delete-' . $token->id }}').submit();">
                                                {{ __('validation.attributes.delete') }}
                                            </a>
                                            <form id="delete-{{ $token->id }}"
                                                  action="{{ route('token.destroy',compact('token')) }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr class="warning">
                                    <td class="text-center" colspan="4">{{ __('personal/token.empty') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop