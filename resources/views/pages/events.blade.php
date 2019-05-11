@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/pages/companiesEvents.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center top-buffer">
        <h2 style="margin-left:5px;"><span style="color: #0E8C7F; font-size:40px">Events</span> and <span style="color: #0E8C7F; font-size:40px">Activites</span> posted by Students</h2>
    </div>
    <div class="row top-buffer">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h4 style="color: #0E8C7F;">Showing {{$firstEventIndex + 5}} out of {{$events->total()}}</h4>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="prodictrow" >
            @foreach($events as $event)
                @include('components.eventsCard')
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center top-buffer" >
        {{ $events->links() }}
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
