@extends('layouts.admin')

@section('content')
<br><br><br><br><br>
<div class="container wow fadeIn">

  <!-- Heading -->

  <!--Grid row-->
  <div class="row">
    <form class="login" action="/admin/login">

<h2 class="text-center">Admin Login</h2>
<input style="width: 350px; margin-left: 500px ;padding: 10px;margin-bottom: 5px ;" class="form-control input-lg" type="text" name="username" placeholder="Username" autocomplete="off">
<input  style="width: 350px; margin-left: 500px ;padding: 10px;margin-bottom: 5px ;" class="form-control " type="password" name="password" placeholder="password" autocomplete="off">
<input  style="width: 350px; margin-left: 500px ;padding: 8px;margin-bottom: 5px ;"class="btn btn-primary btn-block" type="submit"  value="login">

</form>

  </div>
  <!--Grid row-->

</div>

@endsection
