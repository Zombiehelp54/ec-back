@extends('layouts.admin')

@section('content')
<br><br><br><br>
<div class="container wow fadeIn">

    <!-- Heading -->

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-md-8 mb-4">

        <!--Card-->
        <div class="card">

  <h5 class="card-header info-color white-text text-center py-4">
      <strong>Edit Category: {{$cat['title']}}</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form class="text-center" style="color: #757575;" method="post" action="/admin/category/{{$cat['id']}}/edit" enctype="multipart/form-data">

          <!-- Name -->
          @csrf
          <div class="md-form mt-3">
              <input type="text" name="title" id="title" value="{{$cat['title']}}" class="form-control">
              <label for="title">Title</label>
          </div>
              <input type="hidden" name="id" value="{{$cat['id']}}" class="form-control">

          <!-- Description -->
          <div class="md-form">
              <textarea id="desc" name="description" class="form-control md-textarea" rows="3">{{$cat['description']}}</textarea>
              <label for="desc">Description</label>
          </div>
          <label for="img">Image</label>
          <div class="md-form mt-3">
              <input type="file" name="img" id="img" class="form-control">
          </div>
          <img src="/uploads/categories/{{$cat['img']}}">

          <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Submit</button>

      </form>
      <!-- Form -->

  </div>

</div>

        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->

      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
@endsection
