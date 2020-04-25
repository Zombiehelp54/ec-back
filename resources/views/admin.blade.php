@extends('layouts.admin')

@section('content')
<div class="container">
      <br><br><br><br><br><br>
  <div class="row">
    <div class="col-12">
      <div class="float-left">
        <h3 class="text-muted">Products</h3>
      </div>
      <div class="float-right">
        <a href="/admin/product/new">
        Add new
      </a>
      </div>
      <div class="clearfix"></div>
      <ul class="list-group">
        @foreach($products as $product)
        <li class="list-group-item">
          <div class="float-left">{{$product['title']}}
            <br>
            <small class="text-muted"> In Stock: {{$product['nstock']}}</small>
          </div>
          <div class="float-right">
            <a href="/admin/product/{{$product['id']}}/edit"><button class="btn btn-primary btn-md my-0 p waves-effect waves-light">Edit</button></a>
            <a href="/admin/product/{{$product['id']}}/delete"><button class="btn btn-red btn-md my-0 p waves-effect waves-light">Delete </button></a>
            <a href="/product/{{$product['id']}}" target="_blank"><button class="btn btn-primary btn-md my-0 p waves-effect waves-light">View </button></a>
          <div>
        </li>
        @endforeach
      </ul>

    </div>
  </div>
  {{ $products->links() }}
  <br>
  <div class="row">
    <div class="col-12">
      <div class="float-left">
        <h3 class="text-muted">Categories</h3>
      </div>
      <div class="float-right">
        <a href="/admin/category/new">
          Add new
        </a>
      </div>
      <div class="clearfix"></div>
      <ul class="list-group">
        @foreach($cats as $cat)
        <li class="list-group-item">
          <div class="float-left"> {{$cat['title']}}
          <br>
          <small class="text-muted"> Description: {{$cat['description']}} </small>
          </div>
          <div class="float-right">
            <a href="/admin/category/{{$cat['id']}}/edit"><button class="btn btn-primary btn-md my-0 p waves-effect waves-light">Edit</button></a>
            <a href="/admin/category/{{$cat['id']}}/delete"><button class="btn btn-red btn-md my-0 p waves-effect waves-light">Delete </button></a>
            <a href="/category/{{$cat['id']}}"><button class="btn btn-primary btn-md my-0 p waves-effect waves-light">View </button></a>
          <div>
          </li>
          @endforeach
      </ul>
    </div>
  </div>
    </div>
@endsection
