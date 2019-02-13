@extends('layout.master')

@section('title')
    All your cars
@endsection

@section('content')
    @include('layout.flash')
    <div class="row">

        <div class="col-md-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" width="30%">No. plate</th>
                    <th scope="col">Car</th>
                    <th scope="col" width="30%">Action</th>
                </tr>
                </thead>

                @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->plate }}</td>
                        <td>{{ $car->manufacturer }} {{ $car->model }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/cars/{{ $car->id }}" class="btn btn-info">Details</a>
                            </div>
                            <div class="btn-group">
                                <a href="/cars/{{ $car->id }}/edit" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="btn-group">
                                <form action="/cars/{{ $car->id }}" method="post">
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

