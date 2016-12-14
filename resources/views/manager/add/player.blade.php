@extends('master-fluid')

@section('head')

	<link rel="stylesheet" type="text/css" href="/css/manager/add/player.css">
	<link rel="stylesheet" type="text/css" href="/css/sideBar.css">

@stop


@section('content')


	@include('partials.sideBar')

	<div class="wrapper col-md-offset-3 col-md-8">

		<h3>
			Add A Player
		</h3>
		<hr>
<br>
		<form class="col-md-5" method="post" action="/manage/add/players/store" enctype="multipart/form-data">
			{{ csrf_field() }}
			<label for="jersey_no">
				Jersey Number
			</label>
			<input type="number" name="jersey_no">
			{{ $errors->first('jersey_no') }}
<br>
<br>

			<label for="first_name">
				First Name
			</label>
			<input type="text" name="first_name">
			{{ $errors->first('first_name') }}
<br>
<br>
			<label for="last_name">
				Last Name
			</label>
			<input type="text" name="last_name">
			{{ $errors->first('last_name') }}
<br>
<br>
			<label for="role">
				Role
			</label>

			<select class="form-control select-roll" name="roles">
				<option value="">Select</option>
				
				@foreach( $roles as $role )
					<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach

			</select>
			{{ $errors->first('roles') }}
<br>
			<label for="wages">
				Weekly Wages ( $$ )
			</label>

			<input type="number" min="0" name="wages">
			{{ $errors->first('wages') }}
<br>
<br>
			<label for="skills">
				Skills ( Separate The Skills With Commas )
			</label>
			
			<input type="text" name="skills">
			{{ $errors->first('skills') }}

			<br>
			<br>

			<label for="photo">
				Add A Photo
			</label>

			<input type="file" name="photo">

<br>
<br>
<br>
			<button class="btn btn-default">Add Player</button>


		</form>

		
	</div>


@stop