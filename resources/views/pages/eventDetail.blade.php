@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <br><br><br><br>

    <div class="col-md-2"></div>
    <div class="col-md-10">
        <h1>Event Details</h1>
    </div>
    <br><br><br>

    <div class="card">
        <br><br>
        <center>
            <h2>Event Name</h2>
            <h2>___________________________________</h2>
            <br><br>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                voluptas totam<br>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                voluptas totamLorem<br> ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                voluptas totam<br>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                voluptas totamLorem<br> ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                voluptas totam<br>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                voluptas totamLorem <br>ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                voluptas totam<br>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                voluptas totam
            </p>
        </center>
        <h4>Contact: 081274937283</h4><br>
        <h4>blabla@gmail.com</h4><br>
    </div>
@endsection

