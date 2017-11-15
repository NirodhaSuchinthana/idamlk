<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    {{ $user->first_name }} Thanks for creating an account with the <b>idam.lk</b>
    Please follow the link below to verify your email address
    {{ URL::to('register/verify/' . $user->id . '/' . $pin) }}.<br/>

    Or enter the pin manually {{ $pin }}

</div>
</body>
</html>