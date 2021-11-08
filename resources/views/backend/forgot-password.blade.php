<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<form method="POST" action="{{ route('password.email') }}">
            @csrf
    <div class="container-1">
        <br>
        <h2>
            Reset your password
        </h2>
        <p class="text-center">
            Enter your user account's verified email address and we will send you a password reset link.
        </p>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-success">
                {{ session('status') }}
            </div>
        @endif
        
        <input type="email" name="email" :value="old('email')" required autofocus placeholder="Username or email" class="email-input inputs">
        <!--  -->
        
        <!--  -->
        <br><span class="login-span login"><button type="submit" class="btn btn-primary px-5">Password Reset Link</button></span>

    </div>
    </form>
</body>
</html>