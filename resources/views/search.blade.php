@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
<h4> Search Results for: <b>{{_($search)}}</b></h4>
<div class="container dark-grey-text mt-5">

  @foreach($products as $product)
  <div class="row wow fadeIn">
    @php
      $category = \App\Category::where('id',$product['category'])->get()[0]
    @endphp
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
          <input type="number" name="count" value="1" aria-label="Search" class="form-control" style="width: 100px">
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
