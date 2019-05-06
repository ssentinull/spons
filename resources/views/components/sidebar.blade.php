<center>
<div class="sidenav">
    <div class="image-cropper" href="https://placeholder.com">
        <img src="https://via.placeholder.com/360">
    </div>
    <a class="disabled" href="#">{{Auth::user()->name}}</a> 
    @if (Auth::user()-> role == Constant::ROLE_COMPANY)
        <!-- <a class="disabled" href="#">{{$userData->established_in}}</a> -->
        <a class="disabled" href="#">Status</a> <br>
        <a class="disabled" href="#">{{$userData->address}}</a>
        <!-- <a class="disabled" href="#">{{$userData->description}}</a> -->
    @elseif(Auth::user()-> role == Constant::ROLE_STUDENT_INDIVIDUAL)
        <!-- <a class="disabled" href="#">{{$userData->dob}}</a> -->
        <a class="disabled" href="#" style="color: black;">Status</a><br>
        <!-- <a class="disabled" href="#">{{$userData->city}}</a> -->
        <!-- <a class="disabled" href="#">{{$userData->major}}</a> -->
        <!-- <a class="disabled" href="#">{{$userData->faculty}}</a> -->
        <a class="disabled" href="#">{{$userData->university}}</a>
    @elseif(Auth::user()-> role == Constant::ROLE_STUDENT_ORGANIZATION)
        <!-- <a class="disabled" href="#">{{$userData->established_in}}</a> -->
        <a class="disabled" href="#">Status</a><br>
        <!-- <a class="disabled" href="#">{{$userData->major}}</a> -->
        <!-- <a class="disabled" href="#">{{$userData->university}}</a> -->
        <a class="disabled" href="#">{{$userData->address}}</a>
        <!-- <a class="disabled" href="#">{{$userData->description}}</a> -->
    @endif
    <hr>
    <a class="non-disabled" href="#">Events</a>
    <a class="non-disabled" href="{{url('/request')}}">Sponsorship Requests</a>
    <a class="non-disabled" href="#">Transactions</a>
    <hr>

    <div class="editp">
    <button onclick="openForm()">Edit Profile</button>
 
</center> 
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


    </div>
</div>