@extends('layout.master')

@section('title')
    Book new service
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h4 class="mb-3"></h4>
            <form action="/bookings" id="bookingForm" method="post" >
                @csrf
                <div id="bigForm" style="display: none">
                    <!-- Form Create new user -->
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Create new user</h4>
                            <hr class="mb-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">Name:</label>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="password">Password:</label>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Repeat Password:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="password_confirmation">
                            </div>
                        </div>
                    </div>

                    <!-- Form Create new car for new user -->
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Create car for new user</h4>
                            <hr class="mb-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="plate">Vehicle plate no.</label>
                                    <input type="text" class="form-control" id="plate" name="plate" value="{{ old('plate') }}">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="manufacturer">Manufacturer</label>
                                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="model">Model</label>
                                    <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="year">Year</label>
                                    <select class="custom-select d-block w-100" id="year" name="year">
                                        <option value="">Choose year...</option>
                                        @for($year=1901; $year <= \Carbon\Carbon::now()->year; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="hp">Horse power</label>
                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ old('hp') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="cc">Engine cca</label>
                                    <input type="text" class="form-control" id="cc" name="cc" value="{{ old('cc') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="kilometrage">Kilometrage</label>
                                    <input type="text" class="form-control" id="kilometrage" name="kilometrage" value="{{ old('kilometrage') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                </div>
                <!-- Form for add booking -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="service">Service</label>
                            <select name="service_id" id="service_id" class="custom-select d-block w-100">
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" id="dropVehiclePlate">
                            <label for="car">Car</label>
                            <select name="car_id" id="" class="custom-select d-block w-100">
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->plate }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <h4>Date & time</h4>
                        <hr class="mb-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <button id="checkTime" class="btn btn-outline-primary">Check time</button>
                        </div>
                    </div>
                    <div class="col-md-">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input type="text" id="dateTimeValue" class="form-control datetimepicker-input" name="start_time" data-target="#datetimepicker1"/>
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Arrange booking</button>
                        </div>
                        <input type="text" id="bookWithRegister" name="bookWithRegister" value="0">
                    </div>
                </div>
            </form>
            @include('layout.errors')
        </div>
        <div class="col-md-3">
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
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
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

            jQuery(document).ready(function(){
                $('#btnCreateNewUser').on('click', function() {
                    $('#bigForm').toggle();
                    $('#dropVehiclePlate').toggle();

                    var hiddenField = $('#bookWithRegister'),
                        val = hiddenField.val();

                    hiddenField.val(val == 1 ? 0 : 1);
                });
            });
        });
    </script>
@endsection