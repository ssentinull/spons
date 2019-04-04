@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" href="css/comreg.css">
@endpush

@section('content')
    <div class="cardawal">
        <h2>Spons
            <button>Go back to landing page</button>
        </h2>        
        <p>Welcome to the party!</p>
            <div class="regisc">
            <label for="name">Name </label>
            <label style=" margin-left:390px;" for="desc">Company Description</label>
            <br>
            <input type="text" placeholder="Name" name="name" required>
            <br><br>
            <label for="address">Address</label>
            <br>
            <input type="text" placeholder="Address" name="address" required>
            <br><br>
            <label for="city">City</label>
            <br>
            <input type="text" placeholder="City" name="city" required>
            <input style="height:130px; margin-top:-265px; margin-left:500px;" type="text"  name="desc" required>
        </div>
        <div class="data">
        <button style="background-color:#0E8C7F;color:#fff; margin-top:-2px;">Login</button>
        <button style="background-color:#fff;color:#0E8C7F;border-color: #0E8C7F; margin-left:90px;  font-size:0.7em">
            Register as Student
        </button>
        </div>
    </div>
@endsection