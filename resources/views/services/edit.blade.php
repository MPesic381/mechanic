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
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="time_required">Time Required:</label>
                            <input type="text" class="form-control" id="time" placeholder="Time" name="time_required" value="{{  old('time_required', $service->time_required)  }}">
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
        var timepicker = new TimePicker('time', {
            lang: 'en',
            theme: 'dark'
        });
        timepicker.on('change', function(evt) {

            var value = (evt.hour || '00') + ':' + (evt.minute || '00');
            evt.element.value = value;

        });
    </script>
@endsection