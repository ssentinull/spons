@if ($i == 0)
<div class="card flex-column flex-wrap top-buffer custom-card">
@else
<div class="card flex-column flex-wrap top-buffer-extra custom-card">
@endif
    @if (isset($events))
        <div class="card-header p-4" align="center">
            <img src="{{ asset('img/images/activities.svg') }}" style="margin: 1em; width: 280px;" >
        </div>
        <div class="card-block p-4" align="center">
            <a href="{{ route('eventDetailPage', $event->id) }}" style="color: black">
                <h4 class="card-title">{{ $event->name }}</h4>
            </a>
            <p class="card-text">{{ $event->description }}</p>
        </div>
    @else
        <div class="card-block p-4" align="center">
            @if ($grant->grant_types_id == 1)
                <h4 class="card-title">Monetary Grant</h4>
            @elseif ($grant->grant_types_id == 2)
                <h4 class="card-title">Food and Beverages Grant</h4>
            @elseif ($grant->grant_types_id == 3)
                <h4 class="card-title">Technical Support Grant</h4>
            @elseif ($grant->grant_types_id == 4)
                <h4 class="card-title">Venue Grant</h4>
            @endif
            <p class="card-text">
                @if ($grant->nominal_amount != null)
                    Nominal Amount: {{ $grant->nominal_amount }} <br>
                @endif
                @if ($grant->descriptive_amount != null)
                    Descriptive Amount: {{ $grant->descriptive_amount }}
                @endif
            </p>
        </div>
    @endif
</div>
