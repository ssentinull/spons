@extends('layouts.app')

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/registerStudent.js') }}"></script>
@endpush

@push('styles')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/auth/registerStudent.css') }}">
@endpush

@section('content')
<div >
<div class="cardawal">
    <div class="awal">
        <h2>Spons</h2>
        <a href="{{ route('landingPage') }}">
            <button>Go back to landing page</button>
        </a>
        <div>
            <p>Welcome to the party!</p>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            <div class="container">
                <div class="regisc">
                    <div class="#">
                        <div class="card" style="width: 840px !important;">
                            <center>
                                <ul class="nav nav-tabs">
                                    <li><a href="#studentIndividual" data-toggle="tab" style=" color: #0E8C7F; font-size: 1em;">Student Individual</a></li>
                                    <li><a href="#studentOrganization" data-toggle="tab" style=" color: #0E8C7F; font-size: 1em;">Student Organization</a></li>
                                </ul>
                            </center>
                            <div class="tab-content pt-5 pb-5">
                                <div class="tab-pane active" id="studentIndividual">
                                    <form id="studentIndividual" class="tabcontent" method="POST" action="{{ route('registerStudentIndividual') }}">
                                        @csrf
                                        <div class="regisc">
                                            <label for="name">Name </label>
                                            <label style=" margin-left:370px;" for="desc">Faculty<br></label><br>

                                            <input type="text" placeholder="Name" name="name" required>
                                            <input style="margin-left:120px;" type="text" placeholder="Faculty" name="faculty" required><br> <br>

                                            <label for="email">Email</label>
                                            <label for="university" style=" margin-left:370px;">University<br></label> <br>

                                            <input type="text" placeholder="Email" name="email" required>
                                            <input style="margin-left:117px;" type="text" placeholder="University" name="university" required> <br> <br>

                                            <label for="password" >Password</label>
                                            <label style=" margin-left:340px;"  for="major">Major<br></label><br>

                                            <input type="password" placeholder="Password" name="password" required>
                                            <input style="margin-left:113px;" type="text" placeholder="Major" name="major" required><br><br>

                                            <label for="password" >Confirm Password</label> <br>
                                            <input type="password" placeholder="Confirm Password" name="password_confirmation" required> <br><br>

                                            <label for="dob">Date of Birth</label>
                                            <label for="city" style="margin-left:60px;">City</label> <br>

                                            <input style="width: 130px;" type="date" placeholder="Date of Birth" name="dob" required>
                                            <input style="width: 130px;" type="text" placeholder="City" name="city" required>

                                            <input type="hidden"  name="role" value={{ Constant::ROLE_STUDENT_INDIVIDUAL }}>
                                        </div>
                                        <div class="data">
                                            <button style="background-color:#0E8C7F;color:#fff; margin-top:-2px;" type="submit">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="data1">
                                        <a href={{ route('registerCompanyPage') }}>
                                            <button  style="background-color:#fff;color:#0E8C7F;border-color: #0E8C7F; margin-left:90px;  font-size:0.7em">Register as Company</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="studentOrganization">
                                    <form id="studentOrganization" class="tabcontent" method="POST" action="{{ route('registerStudentOrganization') }}">
                                        @csrf
                                        <div class="regisc">
                                            <label for="name">Name </label>
                                            <label for="university" style=" margin-left:365px;">University<br></label> <br>

                                            <input type="text" placeholder="Name" name="name" required>
                                            <input style="margin-left:117px;" type="text" placeholder="University" name="university" required> <br> <br>

                                            <label for="email">Email</label>
                                            <label style=" margin-left:365px;"  for="major">Majority<br></label><br>

                                            <input type="text" placeholder="Email" name="email" required>
                                            <input style="margin-left:113px;" type="text" placeholder="Majority" name="major" required><br><br>

                                            <label for="password" >Password</label>
                                            <label for="description" style=" margin-left:335px;" >Description</label><br><br>

                                            <input type="password" placeholder="Password" name="password" required>

                                            <br><br><label for="password" >Confirm Password</label><br>
                                            <input type="password"  placeholder="Confirm Password" name="password_confirmation" required>
                                            <textarea type="text" style=" margin-left:110px; margin-top:-80px;" placeholder="Description" name="desc" required></textarea>
                                            <br><br>

                                            <label for="dob">Established in</label>
                                            <label for="city" style="margin-left:60px;">Address</label> <br>

                                            <input style="width: 130px;" type="date" placeholder="Established in" name="dob" required>
                                            <input style="width: 130px;" type="text" placeholder="Address" name="Address" required>

                                            <input type="hidden"  name="role" value={{ Constant::ROLE_STUDENT_ORGANIZATION }}>
                                        </div>
                                        <div class="data2">
                                            <button style="background-color:#0E8C7F;color:#fff; margin-top:-2px;" type="submit">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="data1">
                                        <a href="{{route('registerCompanyPage')}}">
                                            <button  style="background-color:#fff; color:#0E8C7F; border-color: #0E8C7F; margin-left:90px;  font-size:0.7em">Register as Company</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
