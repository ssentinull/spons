@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    @include('components.sidebar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL || Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION)
                    @foreach ($events as $event)
                        @include('components.profileCard')
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            @if (Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL || Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION)
                {{ $events->links() }}
            @endif
        </div>
    </div>
@endsection
