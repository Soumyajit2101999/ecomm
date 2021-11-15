<div class="formBx">
    <form action="{{route('frontend.profile_update')}}" method = "POST">
      <h2>Your Profile</h2>
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

@csrf
      <input type="text" name="name" placeholder="Username" value = "{{session()->get('name')}}"/>
      <span class = "text-danger">@error('name'){{ $message }} @enderror</span>
      <input type="text" name="address" placeholder="Address" value = "{{session()->get('address')}}"/>
      <span class = "text-danger">@error('address'){{ $message }} @enderror</span>
      <input type="text" name="pin" placeholder="PIN" value = "{{session()->get('u_pin')}}"/>
      <span class = "text-danger">@error('pin'){{ $message }} @enderror</span>
      <input type="text" name="phone" placeholder="Phone" value = "{{session()->get('phone')}}"/>
      <span class = "text-danger">@error('phone'){{ $message }} @enderror</span>
      <input type="text" name="gender" placeholder="Gender" value = "{{session()->get('gender')}}"/>
      <span class = "text-danger">@error('gender'){{ $message }} @enderror</span>
      <input type="email" name="email" placeholder="Email Address" value = "{{session()->get('email')}}"/>
      <span class = "text-danger">@error('email'){{ $message }} @enderror</span>
      <input type="submit" name="btn_submit" value="Update" />
      
    </form>
  </div>