<div class="card flex-column flex-wrap">
    <div class="card-header" align="center">
        <h2 class="card-title">{{ $events[$i]->name }}</h2>
    </div>
    <div class="card-block" align="center">
        <div class="row">
            <div class="col-md-3">
                @if ($transaction->company_confirmation_status == Constant::SPONSORSHIP_REQUEST_ACCEPTED)
                    Accepted by Company
                @else
                    Denied by Company
                @endif
            </div>
            <div class="col-md-3">
                @if ($transaction->student_confirmation_status == Constant::SPONSORSHIP_REQUEST_ACCEPTED)
                    Accepted by Student
                @else
                    Denied by Student
                @endif
            </div>
            <div class="col-md-3">Event Status</div>
            <div class="col-md-3">LPJ</div>
        </div>
    </div>
</div>
