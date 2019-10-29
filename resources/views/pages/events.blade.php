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
        <h2 style="margin-left:5px;"><span style="color: #0E8C7F; font-size:40px">Events</span> and <span style="color: #0E8C7F; font-size:40px">Activites</span> posted by Students</h2>
    </div>
    <form action="{{ route('eventsFilteredPage') }}">
        <div class="row justify-content-center top-buffer-extra">
            <div class="col-1"></div>
            <div class="col-3">
                <select name="eventCategoryFilter" id="eventCategoryFilter" class="form-control">
                    <option value="" disabled selected>Event Category</option>
                    @foreach($categories as $category )
                        <option value="{{ $category }}">
                            @if ($category == 1)
                                Technology
                            @elseif ($category == 2)
                                Business
                            @elseif ($category == 3)
                                Art
                            @elseif ($category == 4)
                                Science
                            @elseif ($category == 5)
                                Social
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <select name="eventTypeFilter" id="eventTypeFilter" class="form-control">
                    <option value="" disabled selected>Event Type</option>
                    @foreach($types as $type )
                        <option value="{{ $type }}">
                            @if ($type == 1)
                                Seminar
                            @elseif ($type == 2)
                                Festival
                            @elseif ($type == 3)
                                Conference
                            @elseif ($type == 4)
                                Workshop
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <select name="orderByFilter" id="orderByFilter" class="form-control">
                    <option value="" disabled selected>Order By</option>
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
            <div class="col-2">
                <button type="submit" class="w-50 btn green-btn">Filter</button>
            </div>
        </div>
    </form>
    <div class="row top-buffer-extra">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <h4 style="color: #0E8C7F;">There are {{$events->total()}} awesome Events waiting to be sponsored!</h4>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="prodictrow" >
            @foreach($events as $event)
                @include('components.eventsCard')
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center top-buffer-extra bottom-buffer-extra" >
        {{ $events->links() }}
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
