@extends('layout.master')

@section('slider')
    @include('layout.slider')
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <form action="/bookings" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="client">Client:</label>
                        <select id="users" class="form-control" name="client">
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="car">Car:</label>
                        <select id="cars" class="form-control" name="car">
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="service">Service:</label>
                        <select id="service" class="form-control" name="service">
                        </select>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="dateAndTime">Date and Time</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <button class="btn btn-primary">Check</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create new client</h4>
                    <p class="card-text">If you want to create new client you can do it from here</p>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnCreateNewUser">Create new client</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#service').select2({
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

            $('#users').select2({
                ajax: {
                    type: "GET",
                    url: window.location.protocol + "//" + window.location.host + "/api/users/",
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

            $('#cars').select2({
                ajax: {
                    type: "GET",
                    url: window.location.protocol + "//" + window.location.host + "/api/cars/",
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
            })
        })
    </script>
@endsection