@extends('layouts.app')
@section('content')
    <div id="content">
        @include('appointment.availability._list')
    </div>
    <script>
        $(document).ready(function () {
            var _token = $("meta[name=csrf-token]").attr('content');
            setInterval(function(){
                $.ajax({
                    url: "/availability/appointment/{{ $availability->id  }}",
                    type: 'get',
                    data: {_token: _token},
                    datatype: 'json',
                    success: function (data) {
                        //console.log(data)
                    },
                    error: function (data) {
                        //console.log(data)
                    },
                    beforeSend: function (data) {

                    },
                    complete: function (data) {
                        $('#content').html(data.responseText);
                        console.log(data);
                    }
                })
            }, 30000);


        })

    </script>
@stop