@extends('website.backend.layouts.main')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Product Images</h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                <a href="{{route('productImage.create')}}" class="btn btn-success">Add Product Images</a>


        <div id="datatable-responsive_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
 <div class="row"><div class="col-sm-12"><table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
          <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 77px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Product Name</th>
                <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 77px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Image Title</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 77px;" aria-label="Last name: activate to sort column ascending">Image</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 77px;" aria-label="Last name: activate to sort column ascending">Status</th>


                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 77px;" aria-label="Last name: activate to sort column ascending"></th>
                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 77px;" aria-label="Last name: activate to sort column ascending"></th>


            </tr>
            </thead>
          <tbody>
              @foreach ($productImage as $procat )


          <tr role="row">

        <td>{{$procat->product->product_name}}</td>
          <td>{{$procat->image_title}}</td>
          <td>
          <img src="{{asset('images/'.$procat->image)}}" height="50px" width="50px">
        </td>



          <td>{{$procat->status}}</td>


            <td>
            <a class="btn btn-app" href="{{route('productImage.edit',$procat->id)}}">
                    <i class="fa fa-edit"></i> Edit
                  </a>


            </td>
            <td>
                <form method="POST" action="{{route('productImage.destroy',$procat->id)}}">
                    @csrf
                    @method('delete')
                  <button class="btn btn-app">
                    <i class="fa fa-warning"></i> Delete
                  </button>
                  </form>

            </td>

          </tr>
          @endforeach
        </tbody>
        </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable-responsive_info" role="status" aria-live="polite">Showing {{count($productImage)}} entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable-responsive_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable-responsive_previous"><a href="#" aria-controls="datatable-responsive" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable-responsive" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable-responsive_next"><a href="#" aria-controls="datatable-responsive" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>


      </div>
    </div>
  </div>
</div>
    </div>
  </div>
@endsection