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
                            @include('components.card', ['i' => $i])
                        </td>
                        @if ($events[$i + 1] != null)
                            <td>
                                @include('components.card', ['i' => $i + 1])
                            </td>
                        @endif
                    </tr>
                @endfor
            @elseif ($events->count() == 1)
                <tr>
                    <td>
                        @include('components.card', ['i' => 0])
                    </td>
                </tr>
            @else
                <tr>There are no events</tr>
            @endif
       </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $events->links() }}
    </div>
 </div>
@endsection
