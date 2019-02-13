@extends('layout.master')

@section('title')
    Insert new vehicle
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Vehicle information:</h4>
            <form action="/cars/{{$car->id}}" method="post" >
                <div class="row">
                    @csrf
                    @method('PATCH')

                <hr class="mb-4">
                <div class="form-group">
                    <div class="btn-group">
                        <button class="btn btn-primary" type="submit">Update current vehicle</button>
                    </div>
                    <div class="btn-group">
                        <a href="/cars" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>
                @include('layout.errors')
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById("year").value = "{{ $car->year }}";
    </script>
@endsection
