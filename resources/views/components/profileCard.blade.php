@if ($i == 0)
<div class="card flex-column flex-wrap top-buffer">
@else
<div class="card flex-column flex-wrap top-buffer-extra">
@endif
    <div class="card-header p-4" align="center">
        <img src="//placehold.it/440x200?text=Spons" alt="">
    </div>
    <div class="card-block p-4" align="center">
        <h4 class="card-title">{{$event->name}}</h4>
        <p class="card-text">{{$event->description}}</p>
    </div>
</div>
