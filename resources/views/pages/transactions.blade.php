@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/transactionCard.css') }}">
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
                <div class="row top-buffer-extra">
                    <h1>Transactions</h1>
                </div>
                <div class="row justify-content-center">
                    @if (count($transactions) > 0)
                        <div class="col-md-8">
                            @foreach ($transactions as $i => $transaction)
                                @include('components.transactionCard')
                            @endforeach
                        </div>
                    @else
                        <div class="col-md-8 top-buffer-extra">
                            <center>
                                <h2>You haven't made any transactions yet</h2>
                            </center>
                        </div>
                    @endif
                </div>
                <div class="row justify-content-center mb-4 top-buffer-extra">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
