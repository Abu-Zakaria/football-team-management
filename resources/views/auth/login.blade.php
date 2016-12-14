@extends('master')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/managerLogin.css">
	
@stop

@section('content')
	
	<div class="wrapper">

		<h2 class="col-md-offset-2">Log In Page</h2>

		<div class="col-md-offset-2 col-md-6">
			
			<form method="POST" action="/login/log">
			{{ csrf_field() }}
<br>
				<label for="username">
					Your Username
				</label>

				<input type="text" name="username" placeholder="Username">
<br>
<br>

				<label for="username">
					Your Password
				</label>

				<input type="password" name="password" placeholder="******">
<br>				
<br>
				<input type="checkbox" name="remember_me" checked>
				<label for="remember_me">
					Remember Me
				</label>
				<br>
				<br>
				<br>

				<button class="btn btn-primary">Log In</button>

			</form>

		</div>

	</div>

@stop
