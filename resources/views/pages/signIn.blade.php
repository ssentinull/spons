
@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
@endpush

@section('content')
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>

    @endforeach

    <div class="cardawal">
        <h2>Spons
<a href="/home">            <button >Go back to landing page</button></a>
        </h2>        
        <p>Welcome Back!<br>We miss you :)</p>
        <form  role="form" method="POST" action="{{ url('/login') }}">
        @csrf
      
        <div class="login">
            <input type="text" placeholder="Email" name="email" required><br> <br> <br>
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <div class="data">
            <button style="background-color:#0E8C7F;color:#fff;" type="submit">Login</button>
            <button style="background-color:#fff;color:#0E8C7F;border-color: #0E8C7F; margin-left:90px;">
                Register
            </button>
        </div>
        </form>
    </div>
@endsection