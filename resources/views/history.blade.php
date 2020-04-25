@extends('layouts.app')

@section('content')
<div class="container">
      <br><br><br><br>
  <div class="row">
    <div class="col-12">
        <h3 class="text-muted">Purchase History</h3>

        @foreach($orders as $order)
        @php
          $product = App\Product::find($order['productId']);
        @endphp
        <ul class="list-group">
        <li class="list-group-item"> <a href="/product/{{$product['id']}}"> {{$product['title']}} </a>
            <br>
            <small class="text-muted"> Quantity: {{$order['quantity']}} - Total Paid: {{$product['price'] * $order['quantity']}}</small> <br>
            <small> Date Purchased: @php echo date($order['created_at']); @endphp </small>
        </li>
      </ul><br>
        @endforeach


    </div>
  </div>
</div>

</div>
</div>

@endsection
