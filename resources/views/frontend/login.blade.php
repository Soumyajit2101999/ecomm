<div class="formBx">
          <form action="{{ route('frontend.check') }}" method = "POST">
            <h2>Sign In</h2>
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
            <input type="email" name="email" placeholder="UserEmail" />
            <span class = "text-danger">@error('email'){{ $message }} @enderror</span>
            <input type="password" name="password" placeholder="Password" />
            <span class = "text-danger">@error('password'){{ $message }} @enderror</span>
            <input type="submit" name="btn_login" value="Login" />
            <p class="signup">
              Don't have an account ?
              <a href="{{route('frontend.register')}}">Sign Up.</a>
            </p>
          </form>
        </div>