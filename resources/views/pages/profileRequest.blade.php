@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/compRequest.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container">
    <h2>Sponsorship Request</h2>
    <br>
            @include('components.compRequest')

</div>

@endsection