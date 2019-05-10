@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/transactionCard.css')}}">
@endpush

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('components.sidebar')
            </div>
            <div class="col-md-10">
                <div class="row">
                    <h1>Transactions</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @foreach ($transactions as $i => $transaction)
                            @include('components.transactionCard')
                        @endforeach
                    </div>
                </div>
                <div class="row justify-content-center">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
