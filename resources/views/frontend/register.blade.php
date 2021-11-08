<div class="formBx">
          <form action="{{ route('frontend.save') }}" method = "POST">
            <h2>Create an account</h2>
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
            <input type="text" name="name" placeholder="Username" />
            <span class = "text-danger">@error('name'){{ $message }} @enderror</span>
            <input type="text" name="address" placeholder="Address" />
            <span class = "text-danger">@error('address'){{ $message }} @enderror</span>
            <input type="text" name="pin" placeholder="PIN" />
            <span class = "text-danger">@error('pin'){{ $message }} @enderror</span>
            <input type="text" name="phone" placeholder="Phone"/>
            <span class = "text-danger">@error('phone'){{ $message }} @enderror</span>
            <input type="text" name="gender" placeholder="Gender" />
            <span class = "text-danger">@error('gender'){{ $message }} @enderror</span>
            <input type="email" name="email" placeholder="Email Address" />
            <span class = "text-danger">@error('email'){{ $message }} @enderror</span>
            <input type="password" name="password" placeholder="Create Password" />
            <span class = "text-danger">@error('password'){{ $message }} @enderror</span>
            <input type="password" name="confirm_password" placeholder="Confirm Password" />
            <span class = "text-danger">@error('confirm_password'){{ $message }} @enderror</span>
            <input type="submit" name="btn_submit" value="Sign Up" />
            <p class="signup">
              Already have an account ?
              <a href="{{route('frontend.login')}}">Sign in.</a>
            </p>
          </form>
        </div>