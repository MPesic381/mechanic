@extends('layout.master')

@section('slider')
    @include('layout.slider')
@endsection

@section('content')
    <div class="col-md-8">
        <div class="row">
                <select name="service" id="service"></select>
        </div>
        <div class="row">
                <select name="user" id="user"></select>
        </div>
    </div>
    <div class="col-md-4">
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'http://' + window.location.hostname + '/api/services',
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    $.each(results, function (id, result) {
                        $("#service").append($('<option>')
                            .text(result.name)
                            .attr('value', result.id))
                    })
                }
            });

            $.ajax({
                url: 'http://' + window.location.hostname + '/api/users',
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    $.each(results, function (id, result) {
                        $("#service").append($('<option>')
                            .text(result.name)
                            .attr('value', result.id))
                    })
                }
            })
        })
    </script>
@endsection