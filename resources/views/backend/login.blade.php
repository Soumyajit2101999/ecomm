<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset( 'backend/css/style.css' ) }}" rel="stylesheet">
    <link href="{{ asset( 'backend/css/bootstrap.min.css' ) }}" rel="stylesheet">
</head>
<body>
@if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="container-1">
        <h2>
            Login
        </h2>
        <p>
            We're so excited to see you again!
        </p>
        <br><input type="text" name="email" :value="old('email')" required autofocus  placeholder="Username or email" class="email-input inputs">
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
        <!--  -->
        <br><input type="password" name="password" required autocomplete="current-password" placeholder="Password" class="password-input inputs">
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
        <!--  -->
        @if (Route::has('password.request'))
        <span class="forget-span">
            <a href="{{route('forgot')}}" class="forget"> Forget Password?</a>
        </span>
        @endif
        <!--  -->
        <br><span class="login-span login"><button type="submit" class="btn btn-primary px-5">Login</button></span>

    </div>
</form>
</body>
</html>