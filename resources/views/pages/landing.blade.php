@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/landing.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row mt-5 vertical-align">
        <div class="col-md-6">
            <center>
                <h1> Need funds for your <br> Event or Activities?</h1>
                <br>
                <h4>Join the hundreds of event organizers who <br>have posted their events in our platform</h4>
                <br>
                <a href="{{ route('eventsPage') }}" class="purple-button">Look at events</a>
            </center>
        </div>
        <div class="col-md-6" ><img src="../img/images/activities.svg" class="img-responsive" style="height:450px; width:450px;"></div>
    </div>
    <div class="row mt-5 vertical-align">
        <div class="col-md-1"></div>
        <div class="col-md-5"><img src="../img/images/interview.svg" class="img-responsive" style="height:450px; width:450px;"></div>
        <div class="col-md-5">
            <center>
                <br><h1>Looking for Companies <br>to be your sponsor?</h1>
                <br>
                <h4>Enroll your company to show that <br>you are intersted in becoming a sponsor</h4>
                <br>
                <a href="{{ route('companiesPage') }}" class="green-button">Look at <br>Companies</a>
            </center>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row mt-5"></div>
</div>
<footer class="footer-bs">
    <div class="row">
        <div class="col-md-3 footer-brand animated fadeInLeft">
            <h2>Warungku</h2>
            <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
            <p>© 2014 BS3 UI Kit, All rights reserved</p>
        </div>
        <div class="col-md-4 footer-nav animated fadeInUp">
            <h4>Kategori —</h4>
            <div class="col-md-6">
                <ul class="pages">
                    <li><a href="#">Travel</a></li>
                    <li><a href="#">Nature</a></li>
                    <li><a href="#">Explores</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Advice</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Terms & Condition</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2 footer-social animated fadeInDown">
            <h4>Follow Us</h4>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
    </div>
</footer>
@endsection
