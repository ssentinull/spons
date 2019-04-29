@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/signIn.css') }}">
@endpush

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    <div class="vertical-center">
        <div class="container login-card">
            <div class="row">
                <!-- Left side of the card -->
                <div class="col-md-6 p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Spons</h2>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-dark" href={{ route('landingPage') }}>Go back to landing page</a>
                        </div>
                    </div>
                    <div class="row top-buffer pl-4">
                        <p>Welcome Back!<br>We miss you :)</p>
                    </div>
                    <form  role="form" method="POST" action="{{ url('/login') }}">
                        <div class="form-group top-buffer">
                            @csrf
                            <div class="row o">
                                <div class="col-md-8">
                                    <input class="form-control" type="text" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-md-8">
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="row justify-content-around top-buffer">
                                <div class="col-md-2">
                                    <button class="btn btn-success" type="submit">Login</button>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-outline-success" href="{{ route('registerStudentPage') }}">
                                        Register
                                    </a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- Right side of the card -->
                <div class="col-md-6 col-centered" style="background-color: #f6f6f7">
                    <img src="../img/images/login.svg" class="img-responsive" style="height:400px; width:400px;">
                </div>
            </div>
        </div>
    </div>
@endsection
