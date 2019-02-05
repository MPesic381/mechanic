@extends('layout.master')

@section('title')
    Register
@endsection

@section('content')
    <div class="form">
        <form action="/register" method="post">
            @csrf
            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name *" value="{{ old('name') }}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your email *" value="{{ old('email') }}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password *" />
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