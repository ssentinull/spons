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
                <div class="col-md-6 p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Spons</h2>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-dark" style="border-radius: 30px !important; height: 55px; width: 110px; margin-left: 100px;" href={{ route('landingPage') }}>Go back to <br> landing page</a>
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
                                    <input class="form-control" type="text" placeholder="Email" name="email" style="border-color:#0E8C7F; border-radius:5px; border-width: 1.5px; ">
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-md-8">
                                    <input class="form-control" type="password" placeholder="Password" name="password" style="border-color:#0E8C7F; border-radius:5px; border-width: 1.5px; ">
                                </div>
                            </div>
                            <div class="row justify-content-around top-buffer">
                                <div class="col-md-2">
                                    <button class="btn btn-success" type="submit" style="border-radius:35px !important; background-color:#0E8C7F; margin-left: 100px; width: 75px;" onmouseover="this.style.backgroundColor='#fff', this.style.color='#0E8C7F'" onmouseout="this.style.backgroundColor='#0E8C7F' , this.style.color='#fff'">Login</button>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-outline-success" href="{{ route('registerStudentPage') }}" style="border-radius:35px; color: #0E8C7F;">
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
