@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
<div class="container dark-grey-text mt-5">
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

        <form class="d-flex justify-content-left" action=#>
          <!-- Default input -->
          <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px" name="count">
          <button class="btn btn-primary btn-md my-0 p" type="submit" onclick="$.get('/cart/{{$product['id']}}?count='+count.value)">Add to cart
            <i class="fas fa-shopping-cart ml-1"></i>
          </button>

        </form>

      </div>
      <!--Content-->

    </div>
    <!--Grid column-->

  </div>
  <hr>
</div>

</div>
@endsection
