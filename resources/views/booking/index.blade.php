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
                    <th scope="col" width="2%">#</th>
                    <th scope="col" width="30%">No. plate</th>
                    <th scope="col">Car</th>
                    <th scope="col" width="30%">Action</th>
                </tr>
                </thead>

                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->id }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Car options</h4>
                    <p class="card-text">Some example text. Some example text.</p>
                    <a href="/cars/create" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
    </div>
@endsection

