<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/loginregis.css">

	<title>Register Form </title>
</head>
<body  style="background-image: 2.jpg;">
	<div class="container">
		<form action="{{ route('register.save') }}" method="POST" class="login-email">
		@csrf
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
      		<div class="input-group">
				<input type="text" placeholder="Nama" name="name" id="name"  required>
			
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" id="username" name="username"  required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email"  id="email" required>
			</div>
      		<div class="input-group">
				<input type="text" placeholder="Nomor Telepon" name="telp" id="telp" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" id="password"  required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="confirmation_password" id="confirmation_password" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Alamat" name="alamat" id="alamt" required>
			</div>
			<div class="select-group">
                    <select name="role" id="role" required>
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="member">Member</option>  
                    </select>
                </div>
				<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>