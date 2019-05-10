<div class="card flex-column flex-wrap">
    <div class="card-header" align="center">
        <h2 class="card-title">{{ $events[$i]->name }}</h2>
    </div>
    <div class="card-block" align="center">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('eventDetailPage', $events[$i]->id) }}" class="purple-button">Look at Events Detail</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="purple-button">Download event proposal</a>
            </div>
            <div class="col-md-2">
                <a href="#" class="green-button">Accept</a>
            </div>
            <div class="col-md-2">
                <a href="#" class="red-button">Decline</a>
            </div>
        </div>
    </div>
</div>
