@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 class="my-5 h2 text-center">Cart and Checkout</h2>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      @if(count($items) > 0)
      <div class="col-md-8 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <form class="card-body" action="/checkout" method="post">
            @csrf
            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-md-6 mb-2">

                <!--firstName-->
                <div class="md-form ">
                  <input type="text" id="firstName" class="form-control">
                  <label for="firstName" class="">First name</label>
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-6 mb-2">

                <!--lastName-->
                <div class="md-form">
                  <input type="text" id="lastName" class="form-control">
                  <label for="lastName" class="">Last name</label>
                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Username-->
            <div class="md-form input-group pl-0 mb-5">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
              </div>
              <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
            </div>

            <!--email-->
            <div class="md-form mb-5">
              <input type="text" id="email" class="form-control" placeholder="youremail@example.com">
              <label for="email" class="">Email (optional)</label>
            </div>

            <!--address-->
            <div class="md-form mb-5">
              <input type="text" id="address" class="form-control" placeholder="1234 Main St">
              <label for="address" class="">Address</label>
            </div>

            <!--address-2-->
            <div class="md-form mb-5">
              <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
              <label for="address-2" class="">Address 2 (optional)</label>
            </div>

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-lg-4 col-md-12 mb-4">

                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option value="us">United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>

              </div>
              <!--Grid column-->
              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->



            <hr>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm checkout</button>

          </form>

        </div>
        <!--/.Card-->

      </div>
      @else
        <span> You have no items to checkout </span>
      @endif
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-4 mb-4">

        <!-- Heading -->
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">{{count($items)}}</span>
        </h4>

        <!-- Cart -->
        <ul class="list-group mb-3 z-depth-1">
        <!-- {{$total = 0}} -->
          @foreach($items as $item)
        <!--  {{$total = $total + $item['associatedModel']['price']*$item['quantity']}} -->
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <a href="/product/{{$item['associatedModel']['id']}}"> <h6 class="my-0">{{$item['associatedModel']['title']}}</h6> </a>

              <small class="text-muted">Quantity: {{$item['quantity']}}</small>
              <a onclick="$.get('/cart/{{$item['id']}}?remove=1', function(){location.reload()})"><small style="color: red"> Remove </small></a>
            </div>
            <span class="text-muted">${{$item['associatedModel']['price']}}</span>
          </li>
          @endforeach
          <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>${{$total}}</strong>
            </li>
        </ul>
        <!-- Cart -->



      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</div>
@endsection
