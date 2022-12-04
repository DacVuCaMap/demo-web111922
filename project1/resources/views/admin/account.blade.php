<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('cssbyNamVu/login.css') }}">
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
		<div class="leftside">
			<form method="post" action="{{ route('user.postlogin') }}">
                @csrf
				<input type="text" name="loginMail" placeholder="example@email.com">
				<input type="password" name="loginPass" placeholder="password">
				<button type="submit">Login	</button>
			</form>
		</div>
		<div class="rightside"></div>
	</div>

</body>
</html>
