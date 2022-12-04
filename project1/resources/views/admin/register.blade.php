<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('cssbyNamVu/register.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

	<style>
		body{
			background: url('storage/imgNV/bautroidaysao.png');
			background-size:auto; 
		}
	</style>
</head>
<body>
	<div class="container">

		{{-- login form --}}
		<div class="main">
			<form action="" method="post">
				@csrf
				<div class="up">
					<a href="{{ route('user.home') }}"><img class="imghome" src="{{ asset('storage/imgNV/logo1.png') }}" alt="" height="50px" ></a>
					<h2>Create your account</h2>
					<div>
						<p>Your name</p>
						<input class="typein" type="text" name="userName" placeholder="user name"><br>
						
					</div>
                    <div>
						<p>Email</p>
						<input class="typein" type="text" name="userMail" placeholder="example@email.com"><br>
						
					</div>
                    <div>
						<p>Age</p>
						<input class="typein age" type="date" name="userAge"><br>
						
					</div>
					<div>
						<p>Password</p>
						<input class="typein" type="password" name="userPass" placeholder="at least 6 character">
					</div>
                    <div>
						<p>Re-enter Password</p>
						<input class="typein" type="password" name="userRePass" placeholder="re-enter">
					</div>
                    
					
					
					
					<button>Sign up</button>
					<p class="signup">< Back to <a href="{{ route('user.account') }}">Sign in</a></p> 
				</div>
				
				
			</form>
		</div>
		
		
	</div>
	
	
</body>
</html>