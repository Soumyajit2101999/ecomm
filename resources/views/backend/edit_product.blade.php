@extends('backend.master')
@section('content')

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="">Product</a>
        </li>
        <li class="breadcrumb-item active">Product Form</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      <div class="card mb-3 d-none">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="row  d-none">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$34,693</div>
                  <div class="small text-muted">YTD Revenue</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">YTD Expenses</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">YTD Margin</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> News Feed</div>
          <hr class="mt-2">

          <!-- /Card Columns-->
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Pie Chart Example</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Example Notifications Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell-o"></i> Feed Example</div>
            <div class="list-group list-group-flush small">
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>David Miller</strong>posted a new article to
                    <strong>David Miller Website</strong>.
                    <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Samantha King</strong>sent you a new message!
                    <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Jeffery Wellings</strong>added a new photo to the album
                    <strong>Beach</strong>.
                    <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <i class="fa fa-code-fork"></i>
                    <strong>Monica Dennis</strong>forked the
                    <strong>startbootstrap-sb-admin</strong>repository on
                    <strong>GitHub</strong>.
                    <div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">View all activity...</a>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
      </div>
      <!-- Example DataTables Card-->
                @if(session()->has('success'))
                <div class = "alert alert-success">
                {{session()->get('success')}}
                </div>
                @endif

                @if(session()->has('fail'))
                <div class = "alert alert-danger">
                {{session()->get('fail')}}
                </div>
                @endif
      <form action="{{route('backend.edit_product_post')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Product Name</label>
            <input type="text" value = "{{$pro->pro_name}}" name="name" class="form-control" id="inputEmail4">
            <span class="text-danger">@error('name'){{$message}}@enderror</span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Product Price</label>
            <input type="text" value = "{{$pro->pro_price}}" name="price" class="form-control" id="inputEmail4">
            <span class="text-danger">@error('price'){{$message}}@enderror</span>
          </div>
         
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Product Discount</label>
            <input type="text" value = "{{$pro->pro_disc}}" name="discount" class="form-control" id="inputEmail4">
            <span class="text-danger">@error('discount'){{$message}}@enderror</span>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Product Available</label>
              <input type="text" name="available" value = "{{$pro->pro_available}}" class="form-control" id="inputEmail4">
              <span class="text-danger">@error('available'){{$message}}@enderror</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Product Pin</label>
              <input type="text" name="pin" value = "{{$pro->pin}}" class="form-control" id="inputEmail4">
              <span class="text-danger">@error('pin'){{$message}}@enderror</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-10">
            <label for="exampleFormControlTextarea2">Product Description</label>
            <textarea class="form-control" name = "description" id="content" rows="3">{{$pro->pro_description}}"</textarea>
            <span class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
          </div>
         
        <div class="form-row">
            <div class="form-group col-md-4 pt-4 mt-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload Product Image</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="pro_image" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      
                    </div>
                  </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4 pt-4 mt-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload Product multiple Images</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="pro_other_image[]" id="inputGroupFile01" multiple
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      
                    </div>
                  </div>
            </div>
        </div>
        <input type = "hidden" value = "{{$pro->pro_gid}}" name = "gid">
        <input type = "hidden" value = "{{$pro->pro_id}}" name = "id">
        <button type="submit" class="btn btn-primary">Update Product</button>
      </form>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'content' );
</script>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @endsection