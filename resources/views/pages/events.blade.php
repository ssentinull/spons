@extends('layouts.app')

@include('components.navbar')

@section('content')
<div class="container">
    <table class="table table-borderless">
       <tbody>
           @if ($events->count() > 1)
                @for ($i = 0; $i < $events->count(); $i+=2)
                    <tr>
                        <td>
                            <div class="card flex-column flex-wrap">
                                <div class="card-header p-4" align="center">
                                    <img src="//placehold.it/440x200?text=Spons" alt="">
                                </div>
                                <div class="card-block p-4" align="center">
                                    <h4 class="card-title">{{$events[$i + 1]->name}}</h4>
                                    <p class="card-text">{{$events[$i + 1]->description}}</p>
                                </div>
                            </div>
                        </td>
                        @if ($events[$i + 1] != null)
                            <td>
                                <div class="card flex-column flex-wrap">
                                    <div class="card-header p-4" align="center">
                                        <img src="//placehold.it/440x200?text=Spons" alt="">
                                    </div>
                                    <div class="card-block p-4" align="center">
                                        <h4 class="card-title">{{$events[$i + 1]->name}}</h4>
                                        <p class="card-text">{{$events[$i + 1]->description}}</p>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endfor
            @else
                <tr>
                    <td>
                        <div class="card flex-column flex-wrap">
                            <div class="card-header p-4" align="center">
                                <img src="//placehold.it/440x200?text=Spons" alt="">
                            </div>
                            <div class="card-block p-4" align="center">
                                <h4 class="card-title">{{$events[$i + 1]->name}}</h4>
                                <p class="card-text">{{$events[$i + 1]->description}}</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endif
       </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $events->links() }}
    </div>
 </div>
@endsection
