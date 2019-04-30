@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" href="../css/comreg.css">
@endpush

@section('content')
    <div class="cardawal">
        <h2>Spons 
            <a href="{{ route('landingPage') }}">
            <button>Go back to landing page</button>
        </a>
        </h2>        
        <p>Welcome to the party!</p>
        <div class="regisc">
                                            <label for="name">Name </label>
                                            <label for="dob" style="margin-left:370px;">Established in</label><br>

                                            <input type="text" placeholder="Name" name="name" required>
                                            <input type="date"  style="margin-left:117px;" placeholder="Established in" name="dob" required><br><br>

                                            <label for="email">Email</label>
                                            <label for="Address" style=" margin-left:370px;">Address<br></label> <br>

                                            <input type="text" placeholder="Email" name="email" required>
                                            <input style="margin-left:117px;" type="text" placeholder="Address" name="Address" required> <br> <br>

                                            <label for="password" >Password</label>
                                            <label style=" margin-left:340px;"  for="desc">Description<br></label><br>

                                            <input type="password" placeholder="Password" name="password" required>
                                           
                                            <br><br> <label for="password" >Confirm Password</label> 
                                            <textarea type="text" style="width:300px; margin-top:-200px; margin-left:250px; border-radius: 7px; border-color:#0E8C7F; color:#0E8C7F; " placeholder="    Description" name="desc" required></textarea><br>

                                            <input type="password"  placeholder="Confirm Password" name="password_confirmation" required>

                                           
                                            <input type="hidden"  name="role" value={{ Constant::ROLE_STUDENT_ORGANIZATION }}>
                                        </div>
                             
                                        
        <div class="data">
        <button style="background-color:#0E8C7F;color:#fff; margin-top:-2px; font-size: 20px;">Login</button>
        <a href="{{ route('registerStudentPage') }}">
        <button style="background-color:#fff;color:#0E8C7F;border-color: #0E8C7F; margin-left:90px;  font-size:0.7em">
            Register as Student
        </button></a>
        </div>
    </div>
@endsection