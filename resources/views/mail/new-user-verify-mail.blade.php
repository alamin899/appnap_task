<html>
<body>
<strong>Hi {{$user->user}}</strong>,<br>

<p>Thanks for registration!</p>

<p>We need a little more information to complete your registration, including a confirmation of your email address.</p>

<p>Click below to confirm your email address:</p>

<a href="{{route('user.verify',['email_verified_code'=>$user->email_verified_code])}}"
   class="btn btn-primary">Confirm</a>
</body>
</html>