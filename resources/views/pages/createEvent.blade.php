@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/createEvent.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    @include('components.sidebar')
    <div class="cardawal">
        <p>Create an Event</p> <hr>
        <form  role="form" method="POST" action="{{ route('createEvent') }}">
            @csrf
            <div class="regisc">
                <label for="name">Name Event </label>
                <input id="name" type="text" placeholder="Your event's name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                @endif

                <label for="type" >Event Type</label>
                <select id="type" type="number" class="form-control" name="type" style="border-color: #0E8C7F;" >
                    <option value="" disabled selected>Select an Event Type</option>
                    @foreach ($eventTypes as $eventType)
                        <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                    @endforeach
                </select>
                    @if ($errors->has('type'))
                    <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                    </span>
                    @endif
                
                <label for="Category" >Category<br></label>
                <select id="category" type="number" class="form-control" name="category" style="border-color: #0E8C7F;" >
                    <option value="" disabled selected>Select an Event Category</option>
                    @foreach ($eventCategories as $eventCategory)
                        <option value="{{ $eventCategory->id }}">{{ $eventCategory->name }}</option>
                    @endforeach
                </select>
                    @if ($errors->has('category'))
                    <span class="help-block">
                    <strong>{{ $errors->first('category') }}</strong>
                    </span>
                    @endif  

                <label for="date" >Date of Event</label>
                <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required>
                    @if ($errors->has('date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                    @endif

                <label for="Location">Event's Location</label>
                <input id="location" placeholder="Where's your event will be?" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" required>
                    @if ($errors->has('location'))
                   <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('location') }}</strong>
                    </span>
                    @endif

                <label for="Description" >Event's Description</label>
                <textarea id="description" placeholder="Tell us about your Event" type="text" class="form-control" name="description" style="border-color: #0E8C7F;" required></textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
            <div class="data">
                 <button type="submit" >{{ __('Create Event') }}</button>
        </form>
    </div>
@endsection
