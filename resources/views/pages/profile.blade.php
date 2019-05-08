@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <script src="{{ asset('js/editProfile.js') }}" ></script>
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>

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
