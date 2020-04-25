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

          <!-- Brand -->
          <a class="navbar-brand waves-effect" href="/">
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
              <li class="nav-item active">
                <a class="nav-link waves-effect" href="/admin">Admin Dashboard
                  <span class="sr-only">(current)</span>
                </a>
              </li>

            </ul>

            <!-- Right -->
              <li>
                  <a class="nav-link waves-effect" href="/admin/logout">
                      <span> Logout </span>

                  </a>
                </li>
          </div>

        </div>
      </nav>


        <main class="py-4">
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
