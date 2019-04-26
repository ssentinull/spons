<div class="sidenav">
    <div class="image-cropper" href="https://placeholder.com">
        <img src="https://via.placeholder.com/360">
    </div>
    <a class="disabled" href="#">{{Auth::user()->name}}</a>
    @if (Auth::user()-> role == Constant::ROLE_COMPANY)
        <a class="disabled" href="#">{{$userData->established_in}}</a>
        <a class="disabled" href="#">{{$userData->address}}</a>
        <a class="disabled" href="#">{{$userData->description}}</a>
    @elseif(Auth::user()-> role == Constant::ROLE_STUDENT_INDIVIDUAL)
        <a class="disabled" href="#">{{$userData->dob}}</a>
        <a class="disabled" href="#">{{$userData->city}}</a>
        <a class="disabled" href="#">{{$userData->major}}</a>
        <a class="disabled" href="#">{{$userData->faculty}}</a>
        <a class="disabled" href="#">{{$userData->university}}</a>
    @elseif(Auth::user()-> role == Constant::ROLE_STUDENT_ORGANIZATION)
        <a class="disabled" href="#">{{$userData->established_in}}</a>
        <a class="disabled" href="#">{{$userData->major}}</a>
        <a class="disabled" href="#">{{$userData->university}}</a>
        <a class="disabled" href="#">{{$userData->address}}</a>
        <a class="disabled" href="#">{{$userData->description}}</a>
    @endif
    <hr>
    <a class="non-disabled" href="#">Events</a>
    <a class="non-disabled" href="#">Sponsorship Requests</a>
    <a class="non-disabled" href="#">Transactions</a>
    <hr>
</div>
