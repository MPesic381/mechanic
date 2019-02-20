@extends('layout.master')

@section('title')
    Insert new vehicle
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Vehicle information:</h4>
            <form action="/cars" method="post" >
                <div class="row">
                    @csrf
                    <div class="col-md-3 mb-3">
                        <label for="plate">Vehicle plate no.</label>
                        <input type="text" class="form-control" id="plate" name="plate" value="{{ old('plate') }}" required="">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="manufacturer">Manufacturer</label>
                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" required="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="year">Year</label>
                        <select class="custom-select d-block w-100" id="year" name="year" required="">
                            <option value="">Choose year...</option>
                           @for($year=1901; $year <= \Carbon\Carbon::now()->year; $year++)
                               <option value="{{ $year }}">{{ $year }}</option>
                           @endfor
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="hp">Horse power</label>
                        <input type="text" class="form-control" id="hp" name="hp" value="{{ old('hp') }}" required="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="cc">Engine cca</label>
                        <input type="text" class="form-control" id="cc" name="cc" value="{{ old('cc') }}" required="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="kilometrage">Kilometrage</label>
                        <input type="text" class="form-control" id="kilometrage" name="kilometrage" value="{{ old('kilometrage') }}" required="">
                    </div>
                </div>

                <hr class="mb-4">
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Insert new vehicle</button>
                </div>
                @include('layout.errors')
            </form>
        </div>
    </div>
@endsection

