@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/landing.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row mt-3 vertical-align">
        <div class="col-md-6">
            <center>
                <h1> Need funds for your <br> <span style="color: #3f3d56">Event</span> or <span style="color: #3f3d56">Activities</span>?</h1>
                <br>
                <h4>Join the hundreds of <span style="color: #3f3d56">event</span> organizers who <br>have posted their <span style="color: #3f3d56">events</span> in our platform</h4>
                <br>
                <a href="{{ route('eventsPage') }}" class="purple-button">Look at events</a>
            </center>
        </div>
        <div class="col-md-6" ><img src="../img/images/activities.svg" class="img-responsive" style="height:500px; width:500px;"></div>
    </div>
    <div class="row mt-4 vertical-align">
        <div class="col-md-6"><img src="../img/images/interview.svg" class="img-responsive" style="height:500px; width:500px;"></div>
        <div class="col-md-6">
            <center>
                <br><h1>Looking for <span style="color: #0e8c7f">Companies</span> <br>to be your sponsor?</h1>
                <br>
                <h4>Enroll your <span style="color: #0e8c7f">company</span> to show that <br>you are intersted in becoming a sponsor</h4>
                <br>
                <a href="{{ route('companiesPage') }}" class="green-button">Look at Companies</a>
            </center>
        </div>
    </div>
    <div class="row mt-5"></div>
</div>

<footer class="footer">
    <div class="spons"> 
    <b><h2>Spons</h2></b>
    </div>  
    <div class="descrip">
    <p> &nbsp; &nbsp; Created by </p>
    </div>
    <div class="author">
        <p> &nbsp; &nbsp; &nbsp; &nbsp; Intan Pratiwi &nbsp; &nbsp; Hilya Tsaniya &nbsp; &nbsp; Ibnu Ahsani</p>
    </div>

    <div class="png">
    <img src="../img/tria.png">
    </div>

</footer>

@endsection
