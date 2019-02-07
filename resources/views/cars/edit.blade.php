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
                    <div class="col-md-3 mb-3">
                        <label for="plate">Vehicle plate no.</label>
                        <input type="text" class="form-control" id="plate" name="plate" value="{{ old('plate' , $car->plate) }}" required="">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="manufacturer">Manufacturer</label>
                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer' , $car->manufacturer) }}" required="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" name="model" value="{{ old('model' , $car->model) }}" required="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="year">Year</label>
                        <select class="custom-select d-block w-100" id="year" name="year" required="">
                            <option value="">Choose year...</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="hp">Horse power</label>
                        <input type="text" class="form-control" id="hp" name="hp" value="{{ old('hp', $car->hp) }}" required="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="cc">Engine cca</label>
                        <input type="text" class="form-control" id="cc" name="cc" value="{{ old('cc', $car->cc) }}" required="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="kilometrage">Kilometrage</label>
                        <input type="text" class="form-control" id="kilometrage" name="kilometrage" value="{{ old('kilometrage', $car->kilometrage) }}" required="">
                    </div>
                </div>

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
    <script>
        document.getElementById("year").value = "{{ $car->year }}";
    </script>
@endsection

