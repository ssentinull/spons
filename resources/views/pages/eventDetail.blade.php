@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    <div class="vertical-center">
        <div class="container">
            <div class="row top-buffer">
                <div class="col-md-3">
                    <h2 style="color: #3f3d56">Event Details</h2>
                </div>
            </div>
            <div class="row card p-3 top-buffer bottom-buffer-extra">
                <div class="row justify-content-center top-buffer-extra bottom-buffer-extra">
                    <div class="col-md-12">
                        <h2>{{ $event->name }}</h2>
                    </div>
                </div>
                <hr style="height:2px; color:#0e8c7f; background-color:#0e8c7f; width:90%; text-align:center; margin: 0 auto;">
                <div class="row justify-content-center pl-5 pr-5 top-buffer-extra">
                    <div class="col-md-12">
                        <h5>{{ $event->description }}</h5>
                    </div>
                </div>
                <div class="row ml-5 top-buffer-extra">
                    <h5>Contact: {{ $userDataEmail }}</h5>
                </div>
                <div class="row justify-content-between top-buffer">
                    <div class="col-6">
                        <a href="#" class="purple-button-invert">Get Proposal</a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="green-button">Become a Sponsor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

