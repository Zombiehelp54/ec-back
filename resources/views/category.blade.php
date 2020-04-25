@extends('layouts.app')

@section('content')
<br><br><br>
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
        <li class="nav-item">
          <a class="nav-link" href="/">All
          </a>
        </li>
        @foreach ($cats as $cat)
        <li class="nav-item  @if ($category['id'] == $cat['id'])
          active
          @endif ">
          <a class="nav-link" href="/category/{{$cat['id']}} ">{{$cat['title']}} </a>
        </li>
        @endforeach

      </ul>
      <!-- Links -->

      <form class="form-inline" action="/search">
        <div class="md-form my-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="q"><input type="submit" class="search" value="Search" style="margin-left: -10px;height: 37px;">
        </div>
      </form>
    </div>
    <!-- Collapsible content -->

  </nav>

<div class="container dark-grey-text mt-5">
  @foreach($products as $product)
  <div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-6 mb-4">

      <img style="width: 500px;"  src="/uploads/products/{{$product['img']}}" class="img-fluid" alt="">

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-6 mb-4">

      <!--Content-->
      <div class="p-4">
        <a href="/product/{{$product['id']}}">
        <h3> {{$product['title']}}</h3>
      </a>
        <div class="mb-3">
            <span class="badge purple mr-1">{{$category['title']}}</span>
        </div>

        <p class="lead">
          <span>{{$product['price']}}</span>
        </p>

        <p class="lead font-weight-bold">Description</p>

        <p>{{$product['description']}}</p>

        <form class="d-flex justify-content-left">
          <!-- Default input -->
          <input type="number" value="1" aria-label="Search" class="form-control" name="count" style="width: 100px">
          <button class="btn btn-primary btn-md my-0 p" type="submit"  onclick="$.get('/cart/{{$product['id']}}?count='+count.value)">Add to cart
            <i class="fas fa-shopping-cart ml-1"></i>
          </button>

        </form>

      </div>
      <!--Content-->

    </div>
    <!--Grid column-->

  </div>
  <hr>
  @endforeach
</div>
{{ $products->links() }}

</div>
@endsection
