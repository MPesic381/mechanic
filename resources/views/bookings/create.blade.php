@extends('layout.master')

@section('title')
    Book new service
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h4 class="mb-3"></h4>
            <form action="/bookings" id="bookingForm" method="post" >
                <div class="row">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="car">Car</label>
                            <select name="car_id" id="" class="custom-select d-block w-100">
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->plate }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                </div>
                <div class="col-md-12">
                    <hr class="mb-4">
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h4>Date & time</h4>
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
                                <input type="text" id="dateTimeValue" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <button class="btn btn-primary">Arrange booking</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create new client</h4>
                        <p class="card-text">If you want to create new client you can do it from here</p>
                        <div class="form-group">
                            <a href="/bookings/create" class="btn btn-primary">Create new booking</a>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".createUser">Create new client</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".createCar">Create new car</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create User -->
    <div class="modal fade createUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Create new user</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/api/register" method="post">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Car -->
    <div class="modal fade createCar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Create new car</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/cars" method="post" >
                                <div class="row">
                                    @csrf
                                    <div class="col-md-3 mb-3">
                                        <label for="plate">Vehicle plate no.</label>
                                        <input type="text" class="form-control" id="plate" name="plate" value="{{ old('plate') }}" required="">
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="manufacturer">Manufacturer</label>
                                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" required="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="model">Model</label>
                                        <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="year">Year</label>
                                        <select class="custom-select d-block w-100" id="year" name="year" required="">
                                            <option value="">Choose year...</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="hp">Horse power</label>
                                        <input type="text" class="form-control" id="hp" name="hp" value="{{ old('hp') }}" required="">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="cc">Engine cca</label>
                                        <input type="text" class="form-control" id="cc" name="cc" value="{{ old('cc') }}" required="">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="kilometrage">Kilometrage</label>
                                        <input type="text" class="form-control" id="kilometrage" name="kilometrage" value="{{ old('kilometrage') }}" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Insert new vehicle</button>
                                </div>
                                @include('layout.errors')
                            </form>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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

            var dateTime = $('#dateTimeValue').val();
            var service_id = $('#service_id').val();

            $('#checkTime').click(function(e) {

                e.preventDefault();

                $.ajax({
                    url: window.location.protocol + "//" + window.location.host + "/api/availabilityCheck/" + dateTime + "/" + service_id,
                    method: "GET",

                    success:function(response) {
                        console.log(response)
                        $('#dateTimeValue').val(response);
                    }
                })
            })
        });
    </script>
@endsection