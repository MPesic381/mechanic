@extends('layout.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="form">
        <form action="/login" method="post">
            @csrf
            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your email *" value="{{ old('email') }}"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                @include('layout.errors')
            </div>
        </form>
    </div>
@endsection