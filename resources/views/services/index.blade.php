@extends('layout.master')

@section('title')
    All Services
@endsection

@section('content')
    @include('layout.flash')
    <div class="row">

        <div class="col-md-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="col-1">Name</th>
                    <th scope="col" class="col-1">Warranty</th>
                    <th scope="col" class="col-1">Cost</th>
                    <th scope="col" class="col-2">Action</th>
                </tr>
                </thead>

                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->warranty }} km</td>
                        <td>{{ $service->cost }} RSD</td>
                        <td>
                            <div class="btn-group">
                                <a href="/services/{{ $service->id }}" class="btn btn-info">Details</a>
                            </div>
                            <div class="btn-group">
                                <a href="/services/{{ $service->id }}/edit" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="btn-group">
                                <form action="/services/{{ $service->id }}" method="post">
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
                    <h4 class="card-title">Service options</h4>
                    <p class="card-text">Some example text. Some example text.</p>
                    <a href="/services/create" class="btn btn-primary">New service</a>
                </div>
            </div>
        </div>
    </div>
@endsection