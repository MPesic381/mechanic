@extends('layout.master')

@section('title')
    All your bookings
@endsection

@section('content')
    @include('layout.flash')
    <div class="row">

        <div class="col-md-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" width="2%">Plate</th>
                    <th scope="col" width="30%">Service start time</th>
                    <th scope="col">Service end time</th>
                    <th scope="col" width="30%">Action</th>
                </tr>
                </thead>
                @foreach($bookings as $booking)
                    <tr>
                        <td class="font-weight-bold">{{ $booking['car']->plate }}</td>
                        <td>{{ $booking['start_time'] }}</td>
                        <td>{{ $booking['end_time'] }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/bookings/{{ $booking->id }}" class="btn btn-info">Details</a>
                            </div>
                            <div class="btn-group">
                                <form action="/bookings/{{ $booking->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-3">
            <div class="row">
                @if(auth()->user()->hasRole('admin'))
                    <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">Booking option</h4>
                                <p class="card-text">Some example text. Some example text.</p>
                                <div class="form-group">
                                    <a href="/bookings/create" class="btn btn-primary">Create new booking</a>
                                </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection