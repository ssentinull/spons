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
            <h1 style="margin-left:5px; color: #0E8C7F;">Event and Activities posted by Students</h1>
        </center>
    </div>
    <div class="row justify-content-center">
        <div class="row">
            <p style="color: #0E8C7F;">Showing {{$firstEventIndex + 5}} out of {{$events->total()}}</p>
        </div>
        <div class="row">
            <div class="prodictrow">
                @foreach($events as $event)
                    @include('components.eventsCard')
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $events->links() }}
    </div>
</div>
@endsection
