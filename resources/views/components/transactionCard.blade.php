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
    <div class="card-block pt-4" align="center">
        <table class="table table-borderless" style="text-align:center">
            <thead>
                <tr>
                    <th>Confirmation from Company</th>
                    <th>Confirmation from Student</th>
                    <th>LPJ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if ($transaction->company_confirmation_status == Constant::SPONSORSHIP_REQUEST_ACCEPTED)
                            <font style="color: #0e8c7f; font-size: 16px">Accepted</font>
                        @elseif ($transaction->company_confirmation_status == Constant::SPONSORSHIP_REQUEST_REJECTED)
                            <font style="color: #b22222; font-size: 16px">Denied</font>
                        @else
                            <font style="color: #3f3d56; font-size: 16px">Pending Confirmation</font>
                        @endif
                    </td>
                    <td>
                        @if ($transaction->student_confirmation_status == Constant::SPONSORSHIP_REQUEST_ACCEPTED)
                            <font style="color: #0e8c7f; font-size: 16px">Accepted</font>
                        @elseif ($transaction->student_confirmation_status == Constant::SPONSORSHIP_REQUEST_REJECTED)
                            <font style="color: #b22222; font-size: 16px">Denied</font>
                        @else
                            <font style="color: #3f3d56; font-size: 16px">Pending Confirmation</font>
                        @endif
                    </td>
                    <td>
                        <a class="btn green-btn" style="margin: 4px 0px 4px 10px" role="button" href="{{ route('loginPage') }}">{{ __('Download') }}</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
