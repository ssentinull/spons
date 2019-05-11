@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/components/sidebar.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('js/editProfile.js') }}" ></script>
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
                <div class="row top-buffer-extra">
                    @if (Auth::user()->role == Constant::ROLE_COMPANY)
                        <h1>Grants</h1>
                    @else
                        <h1>Events</h1>
                    @endif
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if (Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL || Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION)
                            @foreach ($events as $i => $event)
                                @include('components.profileCard')
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center mb-4 top-buffer-extra">
                    @if (Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL || Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION)
                        {{ $events->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
