@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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
                    <h5 class="modal-title" id="exampleModalLabel">Select Events</h5>
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
                                <button type="submit" class="green-button">Apply for Sponsorship</button>
                            @else
                                <button type="submit" class="green-button-invert" disabled>Apply for Sponsorship</button>
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
            <div class="row top-buffer">
                <div class="col-md-3">
                    <h2 style="color: #3f3d56">Company Details</h2>
                </div>
            </div>
            <div class="row card p-3 top-buffer bottom-buffer-extra">
                <div class="row justify-content-center top-buffer-extra bottom-buffer-extra">
                    <div class="col-md-12">
                        <h2>{{ $companyUser->name }}</h2>
                    </div>
                </div>
                <hr style="height:2px; color:#0e8c7f; background-color:#0e8c7f; width:90%; text-align:center; margin: 0 auto;">
                <div class="row justify-content-center pl-5 pr-5 top-buffer-extra">
                    <div class="col-md-12">
                        <h5>{{ $companyData->description }}</h5>
                    </div>
                </div>
                <div class="row ml-5 top-buffer-extra">
                    <h5>Contact: {{ $companyUser->email }}</h5>
                </div>
                <div class="row justify-content-between top-buffer bottom-buffer">
                    <div class="col-4">
                        @if ($companyData->status == Constant::COMPANY_STATUS_AVAILABLE)
                            <div class="available-status">Available</div>
                        @else
                            <div class="unavailable-status">Unvailable</div>
                        @endif
                    </div>
                    <div class="col-4">
                        @if ($companyData->status == Constant::COMPANY_STATUS_AVAILABLE)
                            @if (Auth::user() !== null && (Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL || Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION))
                                <button type="button" class="green-button" data-toggle="modal" data-target="#basicExampleModal">Apply</button>
                            @elseif(Auth::user() !== null && Auth::user()->role == Constant::ROLE_COMPANY)
                                <a class="green-button-invert" disabled>Apply</a>
                            @else
                                <a href="{{ route('loginPage') }}" class="green-button">Apply</a>
                            @endif
                        @else
                            <a class="green-button-invert" disabled>Apply</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
