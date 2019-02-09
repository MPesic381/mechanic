@extends('layout.master')

@section('title')
    Edit Service
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <form action="/services/{{ $service->id }}" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $service->name) }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="time_required" value="{{ old('time_required', $service->time_required) }}"/>
                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="warranty">Warranty:</label>
                            <input type="text" class="form-control" id="warranty" name="warranty" value="{{ old('warranty', $service->warranty) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cost">Cost:</label>
                            <input type="text" class="form-control" id="cost" name="cost" value="{{ old('price', $service->cost) }}">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Edit</button>
                            <a href="/services" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @include('layout.errors')
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'HH:mm'
            });
        });
    </script>
@endsection