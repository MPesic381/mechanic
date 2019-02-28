@extends('layout.master')

@section('title')
    {{ $car->manufacturer . ' ' . $car->model }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
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
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    @include('cars.partials.service_history')
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Car options</h4>
                    <p class="card-text">Some example text. Some example text.</p>
                    <div class="form-group">
                        <a href="/cars/{{ $car->id }}/works/create" class="btn btn-primary">New Service</a>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKilometrage">
                            Enter new kilometrage
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <a href="/cars" class="btn btn-primary">Back</a>
        </div>
    </div>
    @include('cars.partials.modal_kilometrage')
@endsection

@section('script')
    <script>
        $('#submitKilometrage').click(function (e) {

            e.preventDefault();
            updateKilometrageForm = $('#updateKilometrageForm')

            $.ajax({
                method: "POST",
                url: window.location.protocol + "//" + window.location.host + "/api/cars/{{ $car->id }}/updateKilometrage",
                data: updateKilometrageForm.serialize(),
                dataType: 'json',

                success: function (response) {
                    console.log(response);
                    $('#form-info').html(
                        '<div class="alert alert-info">' + response + '</div>'
                    )

                    $('#submitKilometrage').attr('disabled', 'disabled')
                },

                error: function (xhr) {
                    var errors = (JSON.parse(xhr.responseText).errors);

                    errorsHtml = '<div class="alert alert-danger"><ul>';

                    $.each( errors, function( key, value ) {
                        errorsHtml += '<li>'+ value + '</li>'; //showing only the first error.
                    });

                    errorsHtml += '</ul></div>';

                    $('#form-info').html( errorsHtml )
                }

            })
        })
    </script>
@endsection