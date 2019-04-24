<!-- Side navigation -->
<div class="sidenav">
    <div class="image-cropper" href="https://placeholder.com">
        <img src="https://via.placeholder.com/360">
    </div>
    <a class="disabled" href="#">{{Auth::user()->name}}</a>
    <a class="disabled" href="#">{{$userData->major}}</a>
    <a class="disabled" href="#">{{$userData->faculty}}</a>
    <a class="disabled" href="#">{{$userData->university}}</a>
    <a class="disabled" href="#">{{$userData->description}}</a>
    <hr>
    <a class="non-disabled" href="#">Events</a>
    <a class="non-disabled" href="#">Sponsorship Requests</a>
    <a class="non-disabled" href="#">Transactions</a>
    <hr>
</div>
