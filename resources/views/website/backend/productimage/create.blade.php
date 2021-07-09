@extends('website.backend.layouts.main')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Create Product </h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
      <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data" method="POST" action="{{route('productImage.store')}}">
        @csrf



          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
            <select class="form-control" name="product_id">
                @foreach ($product as $procat)
                <option value="{{$procat->id}}" name="product_id">{{$procat->product_name}}</option>


                @endforeach
            </div>
          </div>


          <div></div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product Name<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="image_title" name="image_title" placeholder="Image Title" required="required" class="form-control ">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image  Upload<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="file" name="image" id="image" onchange="fileSelected();"/>
            </div>
          </div>




          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">

              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>
@endsection