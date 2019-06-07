<div class="sidenav">
    <center>
        <div class="image-cropper">
            @if (Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL)
                <img src="{{ asset('storage/pictures/'.Auth::user()->studentIndividual->picture) }}">
            @elseif (Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION)
                <img src="{{ asset('storage/pictures/'.Auth::user()->studentOrganization->picture) }}">
            @else
                <img src="{{ asset('storage/pictures/'.Auth::user()->company->picture) }}">
            @endif
        </div>

        <a class="disabled" href="#">{{Auth::user()->name}}</a>
        @if (Auth::user()->role == Constant::ROLE_COMPANY)
            <a class="disabled">{{$userData->established_in}}</a>

            @if ($userData->status == Constant::COMPANY_STATUS_AVAILABLE)
                <a class="disabled" style="color: #3CB371">Available for Sponsorship</a>
            @else
                <a class="disabled" style="color: #B22222">Unavailable for Sponsorship</a>
            @endif

            @if ($userData->status == Constant::COMPANY_STATUS_AVAILABLE)
                <a href="{{ route('changeStatus', Auth::user()->id) }}">
                    <button type="button" class="red-button" style="padding: 4px 8px">Change Status to Unavailabe</button>
                </a>
            @else
                <a href="{{ route('changeStatus', Auth::user()->id) }}">
                    <button type="button" class="green-button" style="padding: 4px 12px">Change Status to Available</button>
                </a>
            @endif

            <a class="disabled">{{$userData->address}}</a>
        @elseif(Auth::user()-> role == Constant::ROLE_STUDENT_INDIVIDUAL)
            <a class="disabled">{{$userData->major}}</a>
            <a class="disabled">{{$userData->faculty}}</a>
            <a class="disabled">{{$userData->university}}</a>
        @elseif(Auth::user()-> role == Constant::ROLE_STUDENT_ORGANIZATION)
            <a class="disabled">{{$userData->major}}</a>
            <a class="disabled">{{$userData->university}}</a>
            <a class="disabled">{{$userData->address}}</a>
        @endif
        <hr>

        @if (Auth::user()->role == Constant::ROLE_COMPANY)
            <a class="non-disabled" href="{{ route('profilePage') }}">Grants</a>
        @else
            <a class="non-disabled" href="{{ route('profilePage') }}">Events</a>
        @endif

        <a class="non-disabled" href="{{ route('sponsorshipRequestsPage') }}">Sponsorship Requests</a>
        <a class="non-disabled" href="{{ route('transactionsPage') }}">Transactions</a>
        <hr>

        <button type="button" class="green-button" data-toggle="modal" data-target="#basicExampleModal" style="padding: 5px 31px">Edit Profile</button>
        {{-- <button onclick="openForm()">Edit Profile</button> --}}
    </center>
</div>

<div class="form-popup" id="myForm">
    <form action="#" class="form-container">
        <h3>Edit Profile</h3>

        <div class="image-cropper" href="https://placeholder.com">
            <img src="https://via.placeholder.com/360">
        </div>
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter your new Name" name="name" required>

        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter your new address" name="address" required>

        <label for="city"><b>City</b></label>
        <input type="text" placeholder="Enter your new city" name="city" required>

        <label for="city"><b>Description</b></label><br>
        <textarea placeholder="Enter your new Description" name="desc" required></textarea>

        <button type="submit" class="btn">Update</button><br>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>

<!-- events picker modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Events</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="POST" action="{{ route('studentRequestsSponsorship') }}">
                @csrf
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="green-button">Apply for Sponsorship</button>
                </div>
            </form>
        </div>
    </div>
</div>
