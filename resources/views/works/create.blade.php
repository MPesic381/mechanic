@extends('layout.master')

@section('title')
    Assign new service for car
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/cars/{{ $car->id }}/works" method="POST">
                @csrf
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="service">Service:</label>
                        <select id="service" class="form-control" name="service_id" selected="{{ old('service_id') }}">
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kilometrage">Kilometrage</label>
                        <input type="text" name="kilometrage" class="form-control" value="{{ old('kilometrage') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="date">Date of service</label>
                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="serviced_at" value="{{ old('serviced_at') }}"/>
                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button class="btn btn-primary form-control">Submit</button>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('layout.errors')
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#service').select2({
            ajax: {
                type: "GET",
                url: window.location.protocol + "//" + window.location.host + "/api/services/",
                data: function (params) {
                    return {
                        name: params.term
                    };
                },
                processResults: function (data) {
                    var len = Object.keys(data).length;
                    if (len > 0) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }
        });

        $(function () {
            $('#datetimepicker4').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@endsection