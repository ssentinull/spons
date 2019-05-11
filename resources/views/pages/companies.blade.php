@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/companiesEvents.css') }}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center top-buffer">
        <h2 style="margin-left:5px;"><span style="color: #0E8C7F; font-size:40px">Companies</span> that are listed in our platform</h2>
    </div>
    <div class="row justify-content-center top-buffer">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h4 style="color: #0E8C7F;">Showing {{$firstCompanyIndex + 5}} out of {{$companies->total()}}</h4>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="prodictrow">
            @foreach($companies as $company)
                @include('components.eventsCard')
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center top-buffer">
        {{ $companies->links() }}
    </div>
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
