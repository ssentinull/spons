@if ($i == 0)
<div class="card flex-column flex-wrap top-buffer custom-card">
@else
<div class="card flex-column flex-wrap top-buffer-extra custom-card">
@endif
    <div class="card-header pt-4" align="center">
        <h2 class="card-title">{{ $events[$i]->name }}</h2>
    </div>
    <div class="card-block p-4" align="center">
        <div class="row">
            @if (Auth::user()->role == Constant::ROLE_COMPANY)
                <div class="col-md-4">
                    <a class="btn purple-btn" href="{{ route('eventDetailPage', $events[$i]->id) }}">Look at Event Detail</a>
                </div>
                <div class="col-md-4">
                    @if ($events[$i]->proposal != "")
                        <a class="btn purple-btn" href="{{ route('downloadProposal', $events[$i]->proposal) }}">Download Proposal</a>
                    @else
                        <a class="btn purple-invert-btn" href="#">Download Proposal</a>
                    @endif
                </div>
                <div class="col-md-2">
                    <a class="btn green-btn" href="{{ route('acceptSponsorshipRequest', $sponsorshipRequest->id) }}">Accept</a>
                </div>
                <div class="col-md-2">
                    <a class="btn red-btn" href="{{ route('rejectSponsorshipRequest', $sponsorshipRequest->id) }}">Reject</a>
                </div>
            @else
                <div class="col-md-8">
                    <a class="btn purple-btn" href="{{ route('companyDetailPage', $sponsorshipRequest->user_id) }}">Look at Company Detail</a>
                </div>
                <div class="col-md-2">
                    <a class="btn green-btn" href="{{ route('acceptSponsorshipRequest', $sponsorshipRequest->id) }}">Accept</a>
                </div>
                <div class="col-md-2">
                    <a class="btn red-btn" href="{{ route('rejectSponsorshipRequest', $sponsorshipRequest->id) }}">Reject</a>
                </div>
            @endif
        </div>
    </div>
</div>
