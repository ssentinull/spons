<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/global.css"> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
    
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
       <a class="navbar-brand" href="{{ url('/home') }}" style="color:#0E8C7F; font-size:2em;">
       <b>  Spons </b> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/events') }}" style="color:#0E8C7F;font-size:1.3em;"><b>Events</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#" style="color:#0E8C7F;font-size:1.3em;"><b>Companies</b></a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item" >
                        <a class="btn btn-success my-2 my-sm-0" style="background-color: #0E8C7F !important; border-radius: 20px !important;" role="button" href="{{ url('/login') }}">Login</a>
                    </li>
                    @if (Route::has('registerStudent'))
                        <li class="nav-item" >
                            <a class="btn btn-outline-success my-2 my-sm-0" role="button"  style="border-radius: 20px !important;" href="{{ url('/register') }}" >{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown" style="z-index:19999;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#0E8C7F;font-size:1.3em;" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="z-index:19999; display:inline !important;">
                            @if (Auth::user()->role === Constant::ROLE_STUDENT_INDIVIDUAL)
                                <a class="dropdown-item" href="{{ route('createEventPage') }}">
                                    {{ __('Create Event') }}
                                </a>
                            @endif

                            <a style="z-index:19999;" class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<main class="py-4">
            @yield('content')
        </main>


</body>
</html>
