@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/companiesEvents.css') }}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center top-buffer-extra">
        <h2 style="margin-left:5px;"><span style="color: #0E8C7F; font-size:40px">Companies</span> that are listed in our platform</h2>
    </div>
    <div class="row justify-content-center top-buffer">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <h4 style="color: #0E8C7F;">There are {{$companies->total()}} amazing Companies waiting to be sponsors!</h4>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="prodictrow">
            @foreach($companies as $company)
                @include('components.eventsCard')
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center top-buffer-extra bottom-buffer-extra">
        {{ $companies->links() }}
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
