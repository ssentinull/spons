@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('content')
    @include('components.navbar')
@endsection
 