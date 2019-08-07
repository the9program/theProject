@extends('layouts.app')
@section('content')
    <section id="schedule" class="divider parallax layer-overlay overlay-white-8" data-bg-img="images/bg/bg1.jpg">
        <div class="container pt-80 pb-60">
            <div class="section-content">
                <div class="row">
                    <div class="row mb-30">
                        <div class="col-xs-12 text-right">
                            <a href="{{ route('study.create') }}"
                               class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                            >{{ __('presence/study.add') }}</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-schedule">
                            <thead>
                            <tr class="bg-theme-colored">
                                <th>{{ __('presence/study.interval') }}</th>
                                <th>{{ __('presence/study.title_establishment') }}</th>
                                <th>{{ __('validation.attributes.edit') }}</th>
                                <th>{{ __('validation.attributes.delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($studies as $study)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($study->from)->format('Y') . ' - '
                                     . \Carbon\Carbon::parse($study->to)->format('Y') }}</td>
                                    <td><strong>{{ $study->title }} + {{ $study->establishment }}</strong></td>
                                    <td><a href="{{ route('study.edit',compact('study')) }}" class="btn btn-border hvr-icon-forward btn-theme-colored col-xs-12">{{ __('validation.attributes.edit') }}</a></td>
                                    <td>
                                        <a href="#" class="btn btn-border hvr-icon-forward col-xs-12"
                                           onclick="event.preventDefault();
                                                     document.getElementById('delete-{{$study->id}}').submit();"
                                        >{{ __('validation.attributes.delete') }}</a>
                                        <form id="delete-{{$study->id}}" action="{{ route('study.destroy',compact('study')) }}" method="POST"
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