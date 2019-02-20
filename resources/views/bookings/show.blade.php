@extends('layout.master')

@section('title')
    Booking details
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <p><span class="font-weight-bold">Service:</span> {{ $booking->start_time . ' - ' . $booking->end_time }}</p>
        <p><span class="font-weight-bold">Service type:</span> {{ $booking->service->name }}</p>
        <p><span class="font-weight-bold">Service duration:</span> {{ $booking->service->time_required }}</p>
        <p><span class="font-weight-bold">Car:</span> {{ $booking->car->manufacturer . ' ' . $booking->car->model }}</p>
        <p><span class="font-weight-bold">Car plates:</span> {{ $booking->car->plate }}</p>
        <a href="/bookings" class="btn btn-primary">Back</a>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Service options</h4>
                <p class="card-text">Some example text. Some example text.</p>
            </div>
        </div>
    </div>
</div>
@endsection