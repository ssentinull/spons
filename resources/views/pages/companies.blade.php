@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/events.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container">
    <div>
        <center>
            <h1 style="margin-left:5px; color: #0E8C7F;">Companies that are listed in our platform</h1>
        </center>
    </div>
    <div class="row justify-content-center">
        <div class="row">
            <p style="color: #0E8C7F;">Showing {{$firstCompanyIndex + 5}} out of {{$companies->total()}}</p>
        </div>
        <div class="row">
            <div class="prodictrow">
                @foreach($companies as $company)
                    @include('components.eventsCard')
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $companies->links() }}
    </div>
</div>
@endsection
