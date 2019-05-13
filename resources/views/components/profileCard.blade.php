@if ($i == 0)
<div class="card flex-column flex-wrap top-buffer">
@else
<div class="card flex-column flex-wrap top-buffer-extra">
@endif
    @if (isset($events))
        <div class="card-header p-4" align="center">
            <img src="//placehold.it/440x200?text=Spons" alt="">
        </div>
        <div class="card-block p-4" align="center">
            <h4 class="card-title">{{ $event->name }}</h4>
            <p class="card-text">{{ $event->description }}</p>
        </div>
    @else
        <div class="card-block p-4" align="center">
            <h4 class="card-title">{{ $grant->grant_types_id }}</h4>
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
