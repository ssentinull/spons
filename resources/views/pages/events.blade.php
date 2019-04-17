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
                            <div class="card">
                                <div class="card-header">{{$events[$i]->name}}</div>
                                <div class="card-body">{{$events[$i]->location}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="card">
                                <div class="card-header">{{$events[$i + 1]->name}}</div>
                                <div class="card-body">{{$events[$i + 1]->location}}</div>
                            </div>
                        </td>
                    </tr>
                @endfor
            @else
                <td>
                    <div class="card">
                        <div class="card-header">{{$events[0]->name}}</div>
                        <div class="card-body">{{$events[0]->location}}</div>
                    </div>
                </td>
            @endif
       </tbody>
    </table>
    {{ $events->links() }}
 </div>
@endsection
