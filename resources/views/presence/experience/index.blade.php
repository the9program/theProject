@extends('layouts.app')
@section('content')
    <section id="schedule" class="divider parallax layer-overlay overlay-white-8" data-bg-img="images/bg/bg1.jpg">
        <div class="container pt-80 pb-60">
            <div class="section-content">
                <div class="row">
                    <div class="row mb-30">
                        <div class="col-xs-12 text-right">
                            <a href="{{ route('experience.create') }}"
                               class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                            >{{ __('presence/experience.add') }}</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-schedule">
                            <thead>
                            <tr class="bg-theme-colored">
                                <th>{{ __('presence/experience.interval') }}</th>
                                <th>{{ __('presence/experience.title_establishment') }}</th>
                                <th>{{ __('validation.attributes.edit') }}</th>
                                <th>{{ __('validation.attributes.delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($experiences as $experience)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($experience->from)->format('Y') . ' - '
                                     . \Carbon\Carbon::parse($experience->to)->format('Y') }}</td>
                                    <td><strong>{{ $experience->title }} + {{ $experience->establishment }}</strong></td>
                                    <td>
                                        <a href="{{ route('experience.edit',compact('experience')) }}"
                                           class="btn btn-border hvr-icon-forward btn-theme-colored col-xs-12">
                                            {{ __('validation.attributes.edit') }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-border hvr-icon-forward col-xs-12"
                                           onclick="event.preventDefault();
                                                     document.getElementById('delete-{{$experience->id}}').submit();"
                                        >{{ __('validation.attributes.delete') }}</a>
                                        <form id="delete-{{$experience->id}}" action="{{ route('experience.destroy',compact('experience')) }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop