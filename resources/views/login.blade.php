<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/loginregis.css">

	<title>Login Trash Grab</title>
</head>
<body>
	<div class="container">
		<form action="{{route('login.action')}}" method="POST" class="login-email">
		@csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                 @foreach ($errors->all() as $error)
                 <li>{{$error}}</li>
                 @endforeach
            </ul>
        </div>
        @endif
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Daftar sebagai member? <a href="register">Register Here</a></p>
            <p class="login-register-text">Kembali ke Home? <a href="/">Back</a></p>
		</form>
	</div>
</body>
</html>