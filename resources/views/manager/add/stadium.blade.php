@extends('master-fluid')

@section('head')

	<link rel="stylesheet" type="text/css" href="/css/sideBar.css">
	<link rel="stylesheet" type="text/css" href="/css/manager/add/stadium.css">

@stop

@section('content')

	@include('partials.sideBar')

	<div class="col-md-offset-3 col-md-8">
		
		<h2>
			Add a Stadium
		</h2>

		<hr>

		<form method="post" action="/manage/add/stadium/store" class="col-md-6" enctype="multipart/form-data">

			{{ csrf_field() }}
			
			<label for="name">
				Name
			</label>

			<input type="text" name="name">
<br>
<br>
			<label for="seats">
				Number of Seats
			</label>

			<input type="number" name="seats">
<br>
<br>

			<label for="construction">
				Under Construction
			</label>

			<input type="checkbox" name="construction" checked>
<br>
<br>
			<label for="photos">
				Add A Photos ( It Will Shown On Your Website Too. )
			</label>

			<input type="file" name="photo">
<br>
<br>
<br>
			<button class="btn btn-default">Add Stadium</button>

		</form>

	</div>

@stop