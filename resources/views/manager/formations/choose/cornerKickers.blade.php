@extends('master')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/sideBar.css">
@stop

@section('content')


	@include('partials.sideBar')

	<div class="col-md-offset-2 col-md-9">
		
		<div class="col-md-12">
			<h2>
				Choose Corner-Kick Takers 
			</h2>
			<hr>

			<a href="/manage/formation" class="btn btn-md btn-indigo pull-right">Go Back</a>			
		</div>

		<div class="col-md-10">
			
			<form method="post" action="/manage/formation/choose/corner-kick">

				{{ csrf_field() }}

				<table class="table">
					
					<thead>
						<tr>
							
							<td class="col-md-1">
								Select
							</td>

							<td class="col-md-4">
								Player
							</td>

							<td class="col-md-5">
								Skills
							</td>

						</tr>
					</thead>

					<tbody>
						
						@foreach ( $players as $player )

							<tr>
								<td>
									@if ( $player->cornerKick() )

										<button name="remove" value="{{ $player->id }}" class="btn btn-sm btn-warning">Remove</button>

									@else

										<button name="add" value="{{ $player->id }}" class="btn btn-sm btn-success">Add</button>

									@endif
								</td>

								<td>
									{{ $player->present()->fullName }}

									@if ( $player->captain() )
										(c)
									@endif
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

	</div>


@stop