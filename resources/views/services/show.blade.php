@extends('layout.master')

@section('title')
    Service details
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Time required</th>
                    <th scope="col">Warranty</th>
                    <th scope="col">Cost</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ $service->name }}</th>
                    <td>{{ $service->time_required }} hours</td>
                    <td>{{ $service->warranty }} kilometers</td>
                    <td>{{ $service->cost }} RSD</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <a href="/services" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection