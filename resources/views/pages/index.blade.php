@extends('layout.master')

@section('slider')
    @include('layout.slider')
@endsection

@section('content')
    @if(auth()->user() && auth()->user()->hasRole('client'))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book your service now</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post" id="bookingForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="car">Car</label>
                                        <select id="cars" class="form-control" name="car_id"></select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="service">Service:</label>
                                        <select id="service_id" class="form-control" name="service_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Date and time</label>
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input type="text" id="dateTimeValue" class="form-control datetimepicker-input" name="start_time" data-target="#datetimepicker1"/>
                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="check">&nbsp</label>
                                        <button type="submit" id="checkTime" class="btn btn-primary">Check</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="control-group">
                                        <button class="btn btn-primary" id="submitBooking">Book service</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="form-info" class="form-group"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>
        $('#cars').select2({
            ajax: {
                type: "GET",
                url: window.location.protocol + "//" + window.location.host + "/api/cars/?user_id=@if(auth()->user()) {{ auth()->user()->id }} @endif",
                data: function (params) {
                    return {
                        user_id: $("#users").val(),
                        plate: params.term
                    };
                },
                processResults: function (data) {
                    var len = Object.keys(data).length;
                    if (len > 0) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.plate + ' | ' + item.manufacturer + ' | ' + item.model,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }
        });

        $('#service_id').select2({
            ajax: {
                type: "GET",
                url: window.location.protocol + "//" + window.location.host + "/api/services/",
                data: function (params) {
                    return {
                        name: params.term
                    };
                },
                processResults: function (data) {
                    var len = Object.keys(data).length;
                    if (len > 0) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }
        });

        $('#checkTime').click(function(e) {

            e.preventDefault();

            $.ajax({
                url: window.location.protocol + "//" + window.location.host + "/api/availabilityCheck/" + $('#dateTimeValue').val() + "/" + $('#service_id').val(),
                method: "GET",

                success:function(response) {
                    console.log(response)
                    $('#dateTimeValue').val(response);
                }
            })
        })

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm'
        });

        $('#submitBooking').click(function (e) {

            e.preventDefault();
            bookingForm = $('#bookingForm')

            $.ajax({
                method: "POST",
                url: window.location.protocol + "//" + window.location.host + "/api/booking",
                data: bookingForm.serialize(),
                dataType: 'json',

                success: function (response) {
                    $('#form-info').html(
                        '<div class="alert alert-info">' + response + '</div>'
                    )
                },

                error: function (xhr) {
                    var errors = (JSON.parse(xhr.responseText).errors);

                    errorsHtml = '<div class="alert alert-danger"><ul>';

                    $.each( errors, function( key, value ) {
                        errorsHtml += '<li>'+ value + '</li>'; //showing only the first error.
                    });

                    errorsHtml += '</ul></div>';

                    $('#form-info').html( errorsHtml )
                }

            })
        })
    </script>
@endsection