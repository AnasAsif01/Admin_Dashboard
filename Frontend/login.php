<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./CSS/login.css">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id"
		content="128164564881-lshvcrii4itkec5ees305jlso9sua6gq.apps.googleusercontent.com">

	<title>Document</title>
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="#">
				<h1>Create Account</h1>
				<input class="form-control form-control-user" type="name" id="name" placeholder="Enter Name"
					name="name">
				<input class="form-control form-control-user" type="email" id="semail" aria-describedby="emailHelp"
					placeholder="Email Address" name="email">
				<input class="form-control form-control-user" type="password" id="spassword"
					placeholder="Enter Password" name="password">
				<div style="display:flex; align-items: center;" class="mb-3">
					<h3 style="margin-right: 10px;">Vendor</h3>
					<input type="checkbox" class="form-check-input" id="role"></input>
				</div>
				<hr><br>
				<button type="button" class="btn btn-primary d-block btn-user w-100" id="submit">Sign Up</button>

				<div style="margin-bottom: 10px;"></div>

				<div class="g-signin2" data-onsuccess="onSignIn"></div>

			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="#">
				<h1>Sign in</h1>
				<input class="" type="email" id="email" aria-describedby="emailHelp"
					placeholder="Enter Email Address..." name="email">
				<input class="" type="password" id="password" placeholder="Password" name="password">
				<button class="btn btn-primary d-block btn-user w-100" type="button" id="submitlogin">Login</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./javascript/swapper.js"></script>
<script src="./javascript/login.js"></script>
<script src="./javascript/signup.js"></script>

<script>
	function onSignIn(googleUser) {
		var profile = googleUser.getBasicProfile();
		console.log('ID: ' + profile.getId());
		console.log('Name: ' + profile.getName());
		console.log('Image URL: ' + profile.getImageUrl());
		console.log('Email: ' + profile.getEmail());
	}
	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
			console.log('User signed out.');
		});
	}

</script>


</html>