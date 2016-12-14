@extends('master-fluid')

@section('head')

	<link rel="stylesheet" type="text/css" href="/css/manager/stadiums.css">
	<link rel="stylesheet" type="text/css" href="/css/sideBar.css">

@stop

@section('content')

	@include('partials.sideBar')

	<div class="col-md-offset-3 col-md-8">
		
		<h2>My Stadiums</h2>

		<hr>

		<a class="btn btn-warning pull-right" href="/manage/add/stadium">Add Stadium</a>

		@if (count($stadiums))

			<table class="table">

				<thead>
					<td colspan="4">
						Stadium Name
					</td>

					<td colspan="6">
						Seats
					</td>

				    <td colspan="2">
						Actions
					</td>

				</thead>

				@foreach ( $stadiums as $id => $stadium )

					<tr>

						<td colspan="4">
							{{ $stadium->name }}
						</td>

						<td colspan="6">
							{{ $stadium->seats  }}
						</td>

						<td colspan="1">
							<a href="/manage/view/stadium/{{ $stadium->id  }}">View</a> |
							<a href="/manage/update/stadium/{{ $stadium->id  }}">Update</a>
						</td>

					</tr>

				@endforeach

			</table>

		@else

			<h4>
				No Stadium has been added yet!
			</h4>

		@endif

	</div>

@stop