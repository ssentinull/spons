@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{config('app.name')}}</h5>
            <a href="{{ url('/') }}" class="btn btn-dark">Back to Landing Page</a>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ url('/register/company') }}" class="btn btn-outline-success">Register as Company</a>
            </form>
        </div>
    </div>
@endsection