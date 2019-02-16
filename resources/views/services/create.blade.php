@extends('layout.master')

@section('title')
    Add new service
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <form action="/services" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name">Time required:</label>
                            <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="time_required"/>
                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="warranty">Warranty:</label>
                            <input type="text" class="form-control" id="warranty" name="warranty" value="{{ old('warranty') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cost">Cost:</label>
                            <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Insert</button>
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

        timepicker.on('change', function(evt) {

            var value = (evt.hour || '00') + ':' + (evt.minute || '00');
            evt.element.value = value;

        });
    </script>
@endsection