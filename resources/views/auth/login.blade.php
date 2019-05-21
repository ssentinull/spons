@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/auth/login.css') }}">
@endpush

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    <div class="vertical-center" style="background-image: url(../img/bg.png);">
        <div class="container login-card">
            <div class="row">
                <!-- Left side of the card -->
                <div class="col-md-6 p-5">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <h2>Spons</h2>
                        </div>
                        <div class="col-md-4">
                            <a class="btn dark-grey-btn" href={{ route('landingPage') }}>Go back to <br> landing page</a>
                        </div>
                    </div>
                    <div class="row top-buffer pl-4">
                        <h4>Welcome Back!<br>We miss you :)</h4>
                    </div>
                    <form  role="form" method="POST" action="{{ url('/login') }}">
                        <div class="form-group top-buffer">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <input class="form-control" type="text" placeholder="Email" name="email" style="border-color:#0E8C7F; border-radius:5px; border-width: 1.5px; ">
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-md-8">
                                    <input class="form-control" type="password" placeholder="Password" name="password" style="border-color:#0E8C7F; border-radius:5px; border-width: 1.5px; ">
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-md-5 align-self-end">
                                    <button class="btn green-btn" style="font-size:16px; padding:10px 20px;" type="submit">Login</button>
                                </div>
                                <div class="col-md-5 align-self-end">
                                    <a class="btn purple-invert-btn" style="font-size:16px; padding:10px 20px;" href="{{ route('registerStudentPage') }}">Register</a>
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
