
<div class="bg-other-image">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p class="centered">Contact Us</p>
				<p class="centered1">Home <i class="fas fa-chevron-right"></i> Contact Us</p>
			</div>
		</div>
	</div>	
</div>
	

<div class="container my-4">
	<div class="row">
		<div class="col-lg-12 text-center">
			<p class="font-size3 text-darkblue font-res1">GET IN TOUCH</p>
			<img src="images/title-icon.png" alt="" class="img-fluid">
			<p class="font-size11 text-darkblue">Call now or write a message</p>
			<p class="font-size11 text-darkblue">write a message</p>
			<p class="text-gray">Lorem ipsum dolor sit amet consectetur adipiscing elit, habitant est litora lectus <br>libero ignissim phasellus praesent malesuada</p>
		</div>
	</div>
</div>	

<div class="container d-flex justify-content-center">
	<div class="row">
		<div class="col-lg-4 col-md-6 text-center">
			<div class="box-contact">
				<img src="images/icon-1.png" alt="" class="img-fluid">
				<p class="font-size1">Email Address</p>
				<p class="font-size8 text-darkblue">Info@dunmedic.com</p>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 text-center">
			<div class="box-contact">
				<img src="images/icon-2.png" alt="" class="img-fluid">
				<p class="font-size1">Phone Number</p>
				<p class="font-size8 text-darkblue">+620 456 710</p>
			</div>
		</div>
		<div class="col-lg-4 col-12 text-center py-lg-0 py-md-4">
			<div class="box-contact">
				<img src="images/icon-3.png" alt="" class="img-fluid">
				<p class="font-size1">Our Location</p>
				<p class="font-size8 text-darkblue">Jl. Soekarno-hatta<br>KM 03</p>
			</div>
		</div>
	</div>
</div>	
	
<div class="container my-4">
	<div class="row">
		<div class="col-lg-6 col-12 box-contact1">
			<p class="font-size10 text-white py-3">Operating Hours</p>
			<div class="row">
				<div class="col-lg-6 col-6 text-white font-size1 text-center">
					<p class="py-3"><i class="far fa-calendar-alt"></i> &nbsp;Day1 - Mon</p>
					<p class="py-3"><i class="far fa-calendar-alt"></i> &nbsp;Day2 - Tue</p>
					<p class="py-3"><i class="far fa-calendar-alt"></i> &nbsp;Day3 - Wed</p>
					<p class="py-3"><i class="far fa-calendar-alt"></i> &nbsp;Day4 - Thu</p>
					<p class="py-3"><i class="far fa-calendar-alt"></i> &nbsp;Day5 - Fri</p>
					<p class="py-3"><i class="far fa-calendar-alt"></i> &nbsp;Day6 - Sat</p>
					<p class="py-3"><i class="far fa-calendar-alt"></i> &nbsp;Day7 - Sun</p>
				</div>
				<div class="col-lg-6 col-6 text-white font-size1 text-center px-0">
					<p class="py-3"><i class="fas fa-user-clock"></i> &nbsp; 8:00 am - 6:00 pm</p>
					<p class="py-3"><i class="fas fa-user-clock"></i> &nbsp; 8:00 am - 6:00 pm</p>
					<p class="py-3"><i class="fas fa-user-clock"></i> &nbsp; 8:00 am - 6:00 pm</p>
					<p class="py-3"><i class="fas fa-user-clock"></i> &nbsp; 8:00 am - 6:00 pm</p>
					<p class="py-3"><i class="fas fa-user-clock"></i> &nbsp; 8:00 am - 6:00 pm</p>
					<p class="py-3"><i class="fas fa-user-clock"></i> &nbsp; 8:00 am - 6:00 pm</p>
					<p class="py-3"><i class="fas fa-user-lock"></i> &nbsp; Closed</p>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-12">
			   <div class="bg-form-color-contact my-1">
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
          <form method="post" action="{{ route( 'frontend.contact_post' ) }}">
		  @csrf
            <div>
              <label for="fname" class="text-darkblue pb-2 font-size1">Your Name:</label>
              <br>
			  <input type="text" name="name" placeholder="Your Name" class="form-con-contact">
			  <span class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div>
              <label for="fname" class="text-darkblue py-2 font-size1">Your E-mail:</label>
              <br>
			  <input type="email" name="email" placeholder="Your E-mail" class="form-con-contact">
			  <span class="text-danger">@error('email'){{$message}}@enderror</span>
              <br>
			</div>
			<div>
              <label for="fname" class="text-darkblue py-2 font-size1">Subjects:</label>
              <br>
			  <input type="text" name="subject" placeholder="subject" class="form-con-contact">
			  <span class="text-danger">@error('subject'){{$message}}@enderror</span>
              <br>
            </div>
			<div>
              <label for="fname" class="text-darkblue py-2 font-size1">Message:</label>
              <br>
			  <textarea rows = "6" cols = "200" name="message" placeholder="message" class="form-con-contact"></textarea>
			  <span class="text-danger">@error('message'){{$message}}@enderror</span>
              <br>
            </div>
            <br>
            <div class="button_su"> <span class="su_button_circle"></span> <button type = "submit" class="button_su_inner"> <span class="button_text_container"> Submit </span> </button> </div>
          </form>
        </div>
      </div>
		</div>
	</div>	
	
<div class="container my-4">
	<div class="row">
		<div class="col-lg-12 px-0">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3682.6437603767195!2d88.38065480869612!3d22.629774390312406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89deb47f92069%3A0xac52fad7b17e7144!2sAchieveX%20Solutions!5e0!3m2!1sen!2sin!4v1620279730075!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</div>	
</div>		