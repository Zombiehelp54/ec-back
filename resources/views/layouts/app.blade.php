<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Elgamadan Ecommerce</title>

    <!-- Scripts -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/css/style.min.css" rel="stylesheet">
    <style type="text/css">
      html,
      body,
      header,
      .carousel {
        height: 60vh;
      }

      @media (max-width: 740px) {

        html,
        body,
        header,
        .carousel {
          height: 100vh;
        }
      }

      @media (min-width: 800px) and (max-width: 850px) {

        html,
        body,
        header,
        .carousel {
          height: 100vh;
        }
      }
      footer {
  bottom: 0;
  width: 100%;
}


    </style>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

      <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container">
          @php
            try{
            $userId = \Auth::user()->id;
            \Cart::session($userId);
            $items = \Cart::getContent();
          } catch(Exception $e) {
            $items = [];
          }
          @endphp
          <!-- Brand -->
          <a class="navbar-brand waves-effect" href="{{ url('/') }}"  >
            <strong class="blue-text">Algmdan E-commerce</strong>
          </a>

          <!-- Collapse -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link waves-effect" href="/">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link waves-effect" href="/category/5"  >Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link waves-effect" href="/cart"
                   >Checkout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link waves-effect" href="/history"
                   >History</a>
              </li>

            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
              <li>
              <form class="form-inline" action="/search">
                <div class="md-form my-0">
                  <input class="form-control mr-sm-2" type="text" value="{{ app('request')->input('q') }}" placeholder="Search" name="q" aria-label="Search"> <input type="submit" class="search" value="Search" style="margin-left: -10px;height: 37px;">
                </div>
              </form>
            </li>
              <li class="nav-item">
                <a  href="/cart" class="nav-link waves-effect">
                  <span class="badge red z-depth-1 mr-1"> {{count($items)}} </span>
                  <i class="fas fa-shopping-cart"></i>
                  <span class="clearfix d-none d-sm-inline-block"> Cart </span>
                </a>
              </li>
              @guest
              <li>
                <a href="{{ route('register') }}" class="nav-link waves-effect">
                    <span> Register </span>

                </a>
              </li>
              <li>
                  <a class="nav-link waves-effect" href="{{ route('login') }}">
                      <span> Login </span>

                  </a>
                </li>
                @else
                <li style="padding-top:8px">
                        <span> {{ Auth::user()->name }} </span>
                  </li>
                  <li>
                      <a class="nav-link waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                          <span> Logout </span>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </a>
                    </li>
                  @endguest
          </div>

        </div>
      </nav>

      <!--  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    Left Side Of Navbar
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      -->

        <main class="py-4">

            @foreach (['danger', 'warning', 'success', 'info'] as $msg)


              @if(Session::has('alert-' . $msg))
              <div class="container">
              <br><br><br>
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
              </div>
              @endif

            @endforeach


            @yield('content')
        </main>
    </div>
    <footer class="page-footer text-center font-small mt-4 wow fadeIn">



      <hr class="my-4">

      <!-- Social icons -->
      <div class="pb-4">
        <a href="  "  >
          <i class="fab fa-facebook-f mr-3"></i>
        </a>

        <a href=" "  >
          <i class="fab fa-twitter mr-3"></i>
        </a>

        <a href="  "  >
          <i class="fab fa-youtube mr-3"></i>
        </a>

        <a href="  "  >
          <i class="fab fa-google-plus-g mr-3"></i>
        </a>

        <a href="  "  >
          <i class="fab fa-dribbble mr-3"></i>
        </a>

        <a href="  "  >
          <i class="fab fa-pinterest mr-3"></i>
        </a>

        <a href="  "  >
          <i class="fab fa-github mr-3"></i>
        </a>

        <a href="  "  >
          <i class="fab fa-codepen mr-3"></i>
        </a>
      </div>
      <!-- Social icons -->

      <!--Copyright-->
      <div class="footer-copyright py-3">
        © 2020 Copyright:
        <a href="/"  > Elgamadan Ecommerce </a>
      </div>
      <!--/.Copyright-->
      <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="/js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="/js/mdb.min.js"></script>
      <!-- Initializations -->
      <script type="text/javascript">
        // Animations initialization
        new WOW().init();

      </script>
    </footer>
</body>
</html>
