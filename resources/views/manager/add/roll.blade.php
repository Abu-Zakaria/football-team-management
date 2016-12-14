@extends('master-fluid')


@section('head')

	<link rel="stylesheet" type="text/css" href="/css/sideBar.css">
	<link rel="stylesheet" type="text/css" href="/css/manager/add/role.css">

@stop


@section('content')

	@include('partials.sideBar')

	<div class="col-md-offset-3 col-md-8 wrapper">

		<h2>Add A Role</h2>

		<hr>

		<form class="col-md-6" method="post" action="/manage/add/role/store">
			{{ csrf_field() }}
			<label for="role">
				Role Name
			</label>

			<input type="text" name="name">
<br>
<br>
			<button class="btn btn-primary">Add role</button>

		</form>

		<div class="col-md-5 col-md-offset-1">
			
			<h3>Existing Roles</h3>
			<ol>
				
				@foreach ($roles as $role)

					<li>
						<b>
							{{ $role->name }}
						</b>
					</li>

				@endforeach

			</ol>

		</div>


		
	</div>

@stop