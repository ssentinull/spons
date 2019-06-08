@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/companyEventDetails.css') }}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <!-- events picker modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Select Events</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" method="POST" action="{{ route('studentRequestsSponsorship') }}">
                    @csrf
                    <div class="modal-body">
                        @isset($events)
                            @if (count($events) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Pick</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{ $event->name }}</td>
                                                <td>{{ $event->date }}</td>
                                                <td>
                                                    <input type="checkbox" name="events_picked_ids[]" value="{{ $event->id }}">
                                                </td>
                                                <input type="hidden"  name="student_id" value={{ Auth::user()->id }}>
                                                <input type="hidden"  name="company_id" value={{ $companyUser->id }}>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h2>All of your events have been submitted to this company</h2>
                            @endif
                        @endisset
                    </div>
                    <div class="modal-footer">
                        @isset($events)
                            @if (count($events) > 0)
                                <button class="btn green-btn" style="padding: 12px" type="submit" >Apply for Sponsorship</button>
                            @else
                                <button class="btn green-invert-btn" style="padding: 12px" type="submit" disabled>Apply for Sponsorship</button>
                            @endif
                        @endisset
                    </div>
                </form>
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
                    <h2 style="color: #3f3d56">Company Details</h2>
                </div>
            </div>
            <div class="row card p-3 mb-5 top-buffer">
                <div class="row justify-content-center top-buffer-extra bottom-buffer-extra">
                    <div class="col-md-12">
                        <h2>{{ $companyUser->name }}</h2>
                    </div>
                </div>
                <hr style="height:2px; color:#0e8c7f; background-color:#0e8c7f; width:90%; text-align:center; margin: 0 auto;">
                <div class="row justify-content-center pl-5 pr-5 top-buffer-extra">
                    <div class="col-md-4">
                        <div class="row justify-content-center">
                            <h4>Details</h4>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Status:</h5>
                            </div>
                            <div class="col-md-9">
                                @if ($companyData->status == Constant::COMPANY_STATUS_AVAILABLE)
                                    <h5 style="color: #0e8c7f">Available</h5>
                                @else
                                    <h5 style="color: #b22222">Unvailable</h5>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Address:</h5>
                            </div>
                            <div class="col-md-8">
                                <h5>{{ $companyData->address }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4>Description</h4>
                        <br>
                        <h5>{{ $companyData->description }}</h5>
                    </div>
                </div>
                <div class="row justify-content-between top-buffer-extra">
                    <div class="col-md-4">
                        <h5>Contact: {{ $companyUser->email }}</h5>
                    </div>
                    <div class="col-md-8">
                        @if ($companyData->status == Constant::COMPANY_STATUS_AVAILABLE)
                            @if (Auth::user() !== null && (Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL || Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION))
                                <button class="btn green-btn" style="font-size:16px; padding:10px 31px;" type="button" data-toggle="modal" data-target="#basicExampleModal">Apply</button>
                            @elseif(Auth::user() !== null && Auth::user()->role == Constant::ROLE_COMPANY)
                                <a class="btn green-invert-btn" style="font-size:16px; padding:10px 31px;" disabled>Apply</a>
                            @else
                                <a class="btn green-btn" style="font-size:16px; padding:10px 31px;" href="{{ route('loginPage') }}">Apply</a>
                            @endif
                        @else
                            <a class="btn green-invert-btn" style="font-size:16px; padding:10px 31px; pointer-events:none" href="#">Apply</a>
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
