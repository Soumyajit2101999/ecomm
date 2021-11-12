<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Flipmart premium HTML5 & CSS3 Template</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap-select.min.css')}}">


<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">

{{$pro_detail[0]->pro_name}}



@if(!session()->has('u'))
<input type ="hidden" value = "{{$pro_detail[0]->pro_id}}" name = "id">
    <input type ="number" name = "quan">
<button type = "button" name = "add_pin_submit" class="btn btn-primary icon" data-toggle="modal" data-target="#myModal">Add to Cart</button>
    @else
    <form id = "cart" method = "POST">
    @csrf
    <input type ="hidden" value = "{{$pro_detail[0]->pro_id}}" name = "id">
    <input type ="number" name = "quan">
    <button class="btn btn-primary icon" data-toggle="tooltip" type="submit" id = "btn_cart">Add to cart </button>
                          
    </form>
    @endif

    <div class="container py-5">
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
       <form action="{{route('frontend.review_post')}}" method="post">
         @csrf
          <div class="row">
             <div class="col-md-12">
                <h4>How do you rate this product?</h4>
                <div class="d-flex ">
                   <div class="text-black-50 pt-2">Your Rating :</div> &nbsp; <div class="rating">
                      <input type="radio" name="rating" value="5" id="5">
                      <label for="5">☆</label>
                      <input type="radio" name="rating" value="4" id="4">
                      <label for="4">☆</label>
                      <input type="radio" name="rating" value="3" id="3">
                      <label for="3">☆</label>
                      <input type="radio" name="rating" value="2" id="2">
                      <label for="2">☆</label>
                      <input type="radio" name="rating" value="1" id="1">
                      <label for="1">☆</label>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                   <input type="text" name="name" class="form-control" placeholder="Your Name">
                </div>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                   <input type="text" name="email" class="form-control" placeholder="Your E-Mail">
                </div>
             </div>
             <div class="col-md-12">
                <div class="form-group">
                   <textarea name="message" class="form-control" cols="100" rows="6" placeholder="Your Review"></textarea>
                </div>
             </div>
             <input type ="hidden" value = "{{$pro_detail[0]->pro_id}}" name = "pro_id">
             <div class="col-lg-12"> <a href="#">
                   <button type="submit" class="btn btn-outline-secondary">Submit</button>
                </a> </div>
          </div>
       </form>
    </div>








    <p id = "thank_you_msg"></p>
@if(session()->has('pin_check'))
                <div class = "alert alert-success">
                {{session()->get('pin_check')}}
                </div>
                @endif

                @if(session()->has('fail'))
                <div class = "alert alert-danger">
                {{session()->get('fail')}}
                </div>
                @endif


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Please Give your pincode here</h4>
        </div>
        <form action ="{{route('frontend.pin_check')}}" method = "POST">
        @csrf
        <div class="modal-body">
          <p><input type = "text" name = "given_pin"></p>
        </div>
        <div class="modal-body">
          <p><input type = "submit" value = "Submit"></p>
        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="{{asset('frontend/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/js/lightbox.min.js')}}"></script> 
<script src="{{asset('frontend/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/js/scripts.js')}}"></script>


<script>
//jQuery("#btn_cart").trigger("click");
             jQuery('#cart').submit(function(e){
            jQuery.ajax({
               url:'{{route("frontend.add_to_cart")}}',
               type: 'post',
               data: jQuery('#cart').serialize(),
               success:function(result){
                jQuery('#thank_you_msg').html(result);
                   jQuery('#cart') ['0'].reset();
                   

               }
           });
           e.preventDefault();
        });
        
    </script>
    <script>document.addEventListener("contextmenu", (event) => event.preventDefault());</script>
    
</body>
</html>
