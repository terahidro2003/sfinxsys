
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/feather.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet">
</head>
<body>
  <div class="navbox">
  <nav id="navigation">
    <a href="href="{{ url('/home') }}" class="logo">{{ config('app.name', 'Laravel') }}</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
   </a>
  </nav>
</div>
<div id="side-navigation" class="side-navigation">
  <nav id="side-nav">
    <a href="javascript:void(0);" class="icon mobile" onclick="myFunction()">
    <i class="fa fa-close"></i>
    <a class=" @if(Route::is('home')) active @endif " href="{{route('home')}}"><span data-feather="home"></span> Pagrindinis</a>
    <a class=" @if(Route::is('signup_requests')) active @endif " href="{{route('signup_requests')}}"><span data-feather="inbox"></span> Registracijos</a>
    <a class=" @if(Route::is('groups')) active @endif " href="{{route('groups')}}"><span data-feather="layers"></span></span> Grupės</a>
    <a class=" @if(Route::is('statistics')) active @endif " href="{{route('home')}}"><span data-feather="paperclip"></span> Ataskaitos</a>
    <a class=" @if(Route::is('timetables')) active @endif " href="{{route('timetables')}}"><span data-feather="calendar"></span> Tvarkaraščiai</a>
  </nav>
</div>
  <!-- MOBILE NAVIGATION


   <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/home') }}">{{ config('app.name', 'Laravel') }}</a>

      <input type="text" placeholder="What are you looking for?" class="form-control form-control-dark w-100" v-model="query" name="q">
    </form>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link @if(Route::is('home')) active @endif" id="home-menu-item" href="{{route('home')}}">
                  <span data-feather="home"></span>
                  <span class="item-text">Pagrindinis <span class="sr-only">(current)</span></span>
            </a>
        </li>
         <li class="nav-item text-nowrap dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
      </ul>
    </nav>
    -->
    <!--
    <div class="container-fluid">
      <div class="row">
        <nav class="collapse col-md-2 d-md-block bg-light sidebar" id="navbarToggleExternalContent">
          <div class="sidebar-sticky action-menu">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link @if(Route::is('home')) active @endif" id="home-menu-item" href="{{route('home')}}">
                  <span data-feather="home"></span>
                  <span class="item-text">Pagrindinis <span class="sr-only">(current)</span></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(Route::is('groups')) active @endif" id="groups-menu-item" href="{{route('groups')}}">
                  <span data-feather="file"></span>
                   <span class="item-text">Grupės</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(Route::is('signup_requests')) active @endif" id="signup-menu-item" href="{{route('signup_requests')}}">
                  <span data-feather="users"></span>
                   <span class="item-text">Registracijos</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(Route::is('statistics')) active @endif" id="charts-menu-item" href="{{route('home')}}">
                  <span data-feather="bar-chart-2"></span>
                   <span class="item-text">Ataskaitos</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(Route::is('timetables')) active @endif" id="timetable-menu-item" href="{{route('timetables')}}">
                  <span data-feather="layers"></span>
                   <span class="item-text">Treniruotės</span>
                </a>
              </li>
            </ul>      
          </div>
        </nav>
 
   -->
        @yield('content')
        

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script>
function myFunction() {
   var display_side = document.getElementById("side-navigation").style.display;
   if (display_side == "none"){
      document.getElementById("side-navigation").style.display = "block";
      document.getElementById("side-navigation").style.width = "100%";
      
   }else{
      document.getElementById("side-navigation").style.display = "none";
   }
}
</script>

</body>
</html>
