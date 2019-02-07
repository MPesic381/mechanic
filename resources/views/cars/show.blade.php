@extends('layout.master')

@section('title')
    {{ $car->manufacturer . ' ' . $car->model }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td class="font-weight-bold">Vehicles plate</td>
                        <td class="col-3 bg-secondary text-white font-weight-bold">{{ $car->plate }}</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Year manufactured</td>
                        <td class="bg-secondary text-white">{{ $car->year }}</td>
                    </tr>
                    <tr>
                        <td>Kilometrage</td>
                        <td class="bg-secondary text-white">{{ $car->kilometrage }} kilometers</td>
                    </tr>
                    <tr>
                        <td>Horse power</td>
                        <td class="bg-secondary text-white">{{ $car->hp }} hp</td>
                    </tr>
                    <tr>
                        <td>Engine</td>
                        <td class="bg-secondary text-white">{{ $car->cc }} cc</td>
                    </tr>
                    </tbody>
                </table>
            </div>
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
    <div class="row">
        <div class="col-md-9">
            <a href="/cars" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection

