<div class="card flex-column flex-wrap">
    <div class="card-header" align="center">
        <h2 class="card-title">{{ $events[$i]->name }}</h2>
    </div>
    <div class="card-block" align="center">
        <div class="row">
            @if (Auth::user()->role == Constant::ROLE_COMPANY)
                <div class="col-md-4">
                    <a href="{{ route('eventDetailPage', $events[$i]->id) }}" class="purple-button">Look at Event Detail</a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="purple-button">Download event proposal</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('acceptSponsorshipRequest', $sponsorshipRequest->id) }}" class="green-button">Accept</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('rejectSponsorshipRequest', $sponsorshipRequest->id) }}" class="red-button">Reject</a>
                </div>
            @else
                <div class="col-md-6">
                    <a href="{{ route('companyDetailPage', $sponsorshipRequest->user_id) }}" class="purple-button">Look at Company Detail</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('acceptSponsorshipRequest', $sponsorshipRequest->id) }}" class="green-button">Accept</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('rejectSponsorshipRequest', $sponsorshipRequest->id) }}" class="red-button">Reject</a>
                </div>
            @endif
        </div>
    </div>
</div>
