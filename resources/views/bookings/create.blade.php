@extends('layout.master')

@section('title')
    Book new service
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3"></h4>
            <form action="/bookings" method="post" >
                <div class="row">
                    @csrf
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="car">Car</label>
                            <select name="car_id" id="" class="custom-select d-block w-100">
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->plate }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="service">Service</label>
                            <select name="service_id" id="" class="custom-select d-block w-100">
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <hr class="mb-4">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h4>Date & time</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Check time</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <button class="btn btn-primary">Arrange booking</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
@endsection