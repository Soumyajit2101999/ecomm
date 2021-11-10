@extends('backend.master')
@section('content')

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Category Table</li>
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
        <div class="container"> 
            <div class="row">
                <div class="col-lg-5">
                

        <form action="{{route('backend.category_post')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="form-group ">
            <label for="inputEmail4">Sub Category Name </label>
            <input type="text" name="sub_cat_name" class="form-control" id="inputEmail4">
            <span class="text-danger">@error('achieve_name'){{$message}}@enderror</span>
          </div>
          </div>
          <input name = "parent_id" type = "hidden" value = 0>
          <input name = "is_active" type = "hidden" value = 1>
        
        <button type="submit" class="btn btn-primary">Add Category</button>
      </form>






                </div>
                <div class="col-lg-7">
                <div class="card mb-3 overflow">
        <div class="card-header">
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
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class = "bg-success">
                <tr>
                  <th>Sl No</th>
                  <th>Category Name</th>
                  
                  <th>Add Sub Category</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                    <?php $count = 0; ?>
                    @foreach($sub_cat as $key=>$cat)
                    <tr>
                         
                       <!--  <th scope="row">1</th> -->

                       <td>{{++$count}}</td>
                        <td>{{$cat->category_name}}</td>
                        
                        <td><a class="btn btn-info"  href="">Add</a></td>
                        <td><a class="btn btn-danger"  href="{{route('backend.category_delete',$cat->id)}}">Delete</a></td>
                    </tr>
                   @endforeach
                    
                </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
                </div>
            </div>
        </div>

      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   @endsection