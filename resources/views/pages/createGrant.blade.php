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
    <div class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Create a Grant') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('createGrant') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="grant_types_id" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                    <div class="col-md-6">
                                        <select id="grant_types_id" type="text" class="form-control" name="grant_types_id" >
                                            <option value="" disabled selected>Select a Grant Type</option>
                                            @foreach ($grantTypes as $grantType)
                                                <option value="{{ $grantType->id }}">{{ $grantType->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('grant_types_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('grant_types_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nominal_amount" class="col-md-4 col-form-label text-md-right">{{ __('Nominal Amount') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="nominal_amount" type="number" class="form-control" name="nominal_amount" placeholder="200000"></textarea>

                                        @if ($errors->has('nominal_amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nominal_amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="descriptive_amount" class="col-md-4 col-form-label text-md-right">{{ __('Descriptive Amount') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="descriptive_amount" type="text" class="form-control" name="descriptive_amount" placeholder="10 packs of beverages"></textarea>

                                        @if ($errors->has('descriptive_amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('descriptive_amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create Grant') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
