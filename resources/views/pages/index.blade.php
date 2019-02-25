@extends('layout.master')

@section('slider')
    @include('layout.slider')
@endsection

@section('content')
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client">Client:</label>
                    <select id="users" class="form-control" name="client">
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="car">Car:</label>
                    <select id="cars" class="form-control" name="car">
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#users').select2({
                ajax: {
                    type: "GET",
                    url: window.location.protocol + "//" + window.location.host + "/api/users/",
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

            $('#cars').select2({
                ajax: {
                    type: "GET",
                    url: window.location.protocol + "//" + window.location.host + "/api/cars/",
                    data: function (params) {
                        return {
                            user_id: $("#users").val(),
                            // user_id: params.term
                            // user_id: params.term
                        };
                    },
                    processResults: function (data) {
                        var len = Object.keys(data).length;
                        if (len > 0) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.model,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                }
            })

            $("#users").on("change", function () {
                $("#cars option[value]").remove();

                var newOptions = []; // the result of your JSON request

                $("#cars").append(newOptions).val("").trigger("change");
            });
        })

        // $('#user_id').empty();
        // var newOption = new Option("Select user(email)", "", false, false);
        // $('#user_id').append(newOption).trigger('change');

        // $(document).ready(function () {
        //     $.ajax({
        //         url: 'http://' + window.location.hostname + '/api/services',
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function (results) {
        //             $.each(results, function (id, result) {
        //                 $("#service").append($('<option>')
        //                     .text(result.name)
        //                     .attr('value', result.id))
        //             })
        //         }
        //     });
        //
        //     $.ajax({
        //         url: 'http://' + window.location.hostname + '/api/users',
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function (results) {
        //             $.each(results, function (id, result) {
        //                 $("#service").append($('<option>')
        //                     .text(result.name)
        //                     .attr('value', result.id))
        //             })
        //         }
        //     })
        // })
    </script>
@endsection