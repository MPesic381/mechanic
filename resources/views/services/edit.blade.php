@extends('layout.master')

@section('title')
    Edit Service
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <form action="/service/{{ $service->id }}" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="time_required">Time Required:</label>
                            <input type="text" class="form-control" id="time_required" name="time_required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kolona">Name:</label>
                            <input type="text" class="form-control" id="kolona" name="kolona">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection