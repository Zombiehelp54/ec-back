@extends('layouts.app')

@section('content')
<div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
      <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg'); background-repeat: no-repeat; background-size: cover;">

        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

          <!-- Content -->
          <div class="text-center white-text mx-5 wow fadeIn">
            <h1 class="mb-4">
              <strong class="blue-text">ALGMDAN ECOMMERCE</strong>
            </h1>

            <p>
              <strong>We are giving priority to items that our customers need the most. You may experience shipping delays. Learn more on our FAQ page.</strong>
            </p>

            <p class="mb-4 d-none d-md-block">
              <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and
                written versions
                available. Create your own, stunning website.</strong>
            </p>
          </div>
          <!-- Content -->

        </div>
        <!-- Mask & flexbox options-->

      </div>
    </div>
    <!--/First slide-->


  </div>

</div>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

    <!-- Navbar brand -->
    <span class="navbar-brand">Categories:</span>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">All
            <span class="sr-only">(current)</span>
          </a>
        </li>
        @foreach ($cats as $cat)
        <li class="nav-item">
          <a class="nav-link" href="/category/{{$cat['id']}} ">{{$cat['title']}} </a>
        </li>
        @endforeach

      </ul>
      <!-- Links -->

      <form class="form-inline" action="/search">
        <div class="md-form my-0">
          <input class="form-control mr-sm-2" type="text" name="q" placeholder="Search" aria-label="Search"><input type="submit" class="search" value="Search" style="margin-left: -10px;height: 37px;">
        </div>
      </form>
    </div>
    <!-- Collapsible content -->

  </nav>
  <section class="text-center mb-4">

    <!--Grid row-->

    <div class="row wow fadeIn">

      <!--Grid column-->
      @foreach($products as $product)
      <div class="col-lg-3 col-md-6 mb-4">

        <!--Card-->
        <div  class="card">


          <!--Card image-->
          <div class="view overlay">
            <img style="height: 200px; padding: 10px;" src="/uploads/products/{{$product['img']}}" class="card-img-top"
              alt="">
            <a href="/product/{{$product['id']}}">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body text-center">
            <!--Category & Title-->
            <a href="/product/{{$product['id']}}" class="grey-text">
              <h5>{{$product['title']}}</h5>
            </a>

            <h4 class="font-weight-bold blue-text">
              <strong>{{$product['price']}}</strong>
            </h4>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>
      @endforeach


    </div>

    {{ $products->links() }}
    <!--Grid row-->

  </section>

</div>
@endsection
