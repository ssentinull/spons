@if ($i == 0)
<div class="card flex-column flex-wrap top-buffer custom-card">
@else
<div class="card flex-column flex-wrap top-buffer-extra custom-card">
@endif
    <div class="card-header pt-4" align="center">
        <a href="{{ route('eventDetailPage', $events[$i]->id) }}" style="color:black">
            <h2 class="card-title">{{ $events[$i]->name }}</h2>
        </a>
    </div>
    <div class="card-block p-4" align="center">
        <div class="row">
            <div class="col-md-3">
                @if ($transaction->company_confirmation_status == Constant::SPONSORSHIP_REQUEST_ACCEPTED)
                    Accepted by Company
                @elseif ($transaction->company_confirmation_status == Constant::SPONSORSHIP_REQUEST_REJECTED)
                    Denied by Company
                @else
                    Pending Confirmation from Company
                @endif
            </div>
            <div class="col-md-3">
                @if ($transaction->student_confirmation_status == Constant::SPONSORSHIP_REQUEST_ACCEPTED)
                    Accepted by Student
                @elseif ($transaction->student_confirmation_status == Constant::SPONSORSHIP_REQUEST_REJECTED)
                    Denied by Student
                @else
                    Pending Confirmation from Student
                @endif
            </div>
            <div class="col-md-3">Event Status</div>
            <div class="col-md-3">LPJ</div>
        </div>
    </div>
</div>
