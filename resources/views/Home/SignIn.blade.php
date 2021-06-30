<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | FundBox</title>
    <link rel="stylesheet" href="{{ asset('/css/pages/signin&signup.css') }}"><!--Header-->
</head>
<body>

<nav aria-label="breadcrumb" class="breadcrumb">
	<div class="">
		<a href="{{URL::to('/')}}" class="text-success">Back Home</a></li>
	</div>
</nav>
<div class="card-content">
    <div class="card-body">
		<div class="alert alert-success alert-dismissible mb-2" role="alert">
			<div class="d-flex align-items-center">
				<i class="bx bx-like"></i>
				<b style="color: red;">
					{{ session()->get('message') }}
				</b>
			</div>
		</div>
	</div>
</div>
<br>

<div class="container" id="container">
	
	<div class="form-container sign-up-container">
		<form action="/SignUp" method="POST">
		@csrf
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" name="signup_name" placeholder="Full Name" required/>
			<input type="text" name="signup_username" placeholder="Username" required/>
			<input type="email" name="signup_email" placeholder="Email" required/>
			<input type="number" name="signup_phone" placeholder="Phone" required/>
			<input type="password" name="signup_password" placeholder="Password" required/>
			<input type="password" name="signup_con_password" placeholder="Confirm Password" required/>

			<button type="submit">Sign Up</button>
		</form>
	</div>
	
	<div class="form-container sign-in-container">
		
		<form action="/SignIn" method="POST">
		@csrf
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="email" name="login_email" placeholder="Email" required/>
			<input type="password" name="login_password" placeholder="Password" required/>

			<a href="#">Forgot your password?</a>
			<button type="submit">Sign In</button>
			
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
</footer>
</body>
</html>