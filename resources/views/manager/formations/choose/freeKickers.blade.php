@extends('master')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/sidebar.css">
@stop

@section('content')

	@include('partials.sideBar')

	<div class="col-md-offset-2 col-md-9">
		
		<h2>Choose Set-Piece Takers</h2>
		<hr>

		<a href="/manage/formation" class="btn btn-md btn-indigo pull-right">Go Back</a>

		<form method="post" action="/manage/formation/choose/free-kick">

			{{ csrf_field() }}

			<table class="table">
				
				<thead>
					<tr>
						<td>
							Select
						</td>

						<td>
							Player
						</td>
						
						<td>
							Skills
						</td>
					</tr>
				</thead>

				<tbody>
					
					@foreach ( $players as $player )

						<tr>
							<td>
								@if ( $player->freeKick() )
									
									<button class="btn btn-warning btn-sm" name="remove" value="{{ $player->id }}">Remove</button>

								@else

									<button class="btn btn-success btn-sm" value="{{ $player->id }}" name="player">Add</button>
								@endif
							</td>
							<td>
								{{ $player->present()->fullName }}
							</td>

							<td>
								{{ $player->skills }}
							</td>

						</tr>

					@endforeach

				</tbody>

			</table>

		</form>
		

	</div>

@stop