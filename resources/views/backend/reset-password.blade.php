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
    <form method="POST" action="{{ route('backend.forgot-password')}}">
        @csrf 
       
    <div class="container-1">
        <h2>
            Reset your password
        </h2>
        <p>
            We're so excited to see you again!
        </p>
       
        <br><input type="text" placeholder="New Password" class="email-input inputs" name="password" required autocomplete="new-password">
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
        <!--  -->
        <br><input type="text" placeholder="Confirm Password" class="email-input inputs" name="password_confirmation" required autocomplete="new-password">
        <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
        <!--  -->
        <!--  -->
        <br><span class="login-span login"><button type="submit" class="btn btn-primary px-5">Change Password</button></span>

    </div>
</form>
</body>
</html>