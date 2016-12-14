@extends('master')

@section('head')

	<link rel="stylesheet" type="text/css" href="/css/sideBar.css">
	<link rel="stylesheet" type="text/css" href="/css/manager/add/captain.css">

@stop

@section('content')

	@include('partials.sideBar')

	<div class="col-md-offset-2 col-md-10">

		<h2>
			@if ( $captain )
				Update

			@else

				Add A New

			@endif Captain
		</h2>

		<hr>

		<div class="col-md-9">
			<form method="post" action="/manage/add/captain/add">

				{{ csrf_field() }}

				<div class="row">
					
					<h4 class="pull-left">Players</h4>

					<h4 class="pull-right">Select A Player For The Captaincy!</h4>

				</div>
			
				<hr>

				<u>Sorted By Weekly Wages</u>

				<div class="col-md-12">
					
					@foreach ( $players as $player )

						<div class="col-md-5">
							
							<label>
								
								<input name="captain" class="radio-btn" type="radio" value="{{ $player->id }}">{{ $player->present()->fullName }}
							</label>

						</div>

					@endforeach


				</div>
				<div class="col-md-12">
					<br>
					<br>
					<br>
					<button class="btn btn-brown">Make Captain</button>

					<a href="/manage/formation" class="btn btn-danger">Go Back</a>

				</div>


			</form>
		</div>
		
	</div>	

@stop