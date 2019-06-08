@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/companyEventDetails.css') }}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Sorry, but you do not have permission to download the proposal</h2>
                </div>
            </div>
        </div>
    </div>

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
                        @if (!Auth::user() || Auth::user()->role != Constant::ROLE_COMPANY)
                            <a class="btn purple-invert-btn" style="font-size:16px; padding:10px 31px;" data-toggle="modal" data-target="#exampleModalCenter">Get Proposal</a>
                        @else
                            <a class="btn purple-invert-btn" href="{{ route('downloadProposal', $event->proposal) }}" style="font-size:16px; padding:10px 31px;">Get Proposal</a>
                        @endif
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
