@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/sponsorshipRequestCard.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('components.sidebar')
            </div>
            <div class="col-md-10">
                <div class="row">
                    <h1>Sponsorship Requests</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if (count($sponsorshipRequests) > 0)
                            @foreach ($sponsorshipRequests as $i => $sponsorshipRequest)
                                @include('components.sponsorshipRequestCard')
                            @endforeach
                        @else
                            <h2>You don't have any new sponsorship request</h2>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    {{ $sponsorshipRequests->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
