@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/companyEventDetails.css') }}">
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
            <div class="row top-buffer-extra">
                <div class="col-md-3">
                    <h2 style="color: #3f3d56">Event Details</h2>
                </div>
            </div>
            <div class="row card p-3 mb-5 top-buffer">
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
                <div class="row justify-content-between top-buffer bottom-buffer">
                    <div class="col-6">
                        <a class="btn purple-invert-btn" style="font-size:16px; padding:10px 31px;" href="#">Get Proposal</a>
                    </div>
                    <div class="col-6">
                        @if (!Auth::user())
                            <a class="btn green-btn" style="font-size:16px; padding:10px 31px;" href="{{ route('loginPage') }}">Become a Sponsor</a>
                        @else
                            @if (Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL || Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION)
                                <button class="btn green-invert-btn" disabled>Become a Sponsor</button>
                            @else
                                <a class="btn green-btn" href="{{ route('companyRequestsSponsorship', $event->id) }}" disabled>Become a Sponsor</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
