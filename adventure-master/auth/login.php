<?php
	session_start();
    if(isset($_SESSION['login'])){
		echo"<script type='text/javascript'>
			alert('Sudah Login');
			window.history.go(-1);
		</script>";
		exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/login.css">
	<title>Document</title>
</head>

<body>
	<!-- register -->
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="register_action.php" method='POST'>
				<input type="text" placeholder="Nama" name='nama' required>
				<input type="number" placeholder="Nomor Telepon" name='no_telp' required>
				<select name="gender">
					<option value="" selected hidden required>Jenis Kelamin</option>
					<option value="P">Pria</option>
					<option value="W">Wanita</option>
				</select>
				<input type="date" placeholder="Tanggal Lahir" name='tgl_lahir' required>
				<input type="email" placeholder="Email" name='email' required>
				<input type="password" placeholder="Password" name='pass' required>
				<button>Sign Up</button>
			</form>
		</div>
		<!-- login -->
		<div class="form-container sign-in-container">
			<form action="login_action.php" method='POST'>
				<h1>Sign in</h1>
				<input type="text" placeholder="Email" name='email'>
				<input type="password" placeholder="Password" name='pass'>
				<!-- <a href="#">Lupa Password?</a> -->
				<button type='submit'>Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>

</html>