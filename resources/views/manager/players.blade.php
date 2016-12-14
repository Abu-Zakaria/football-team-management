@extends('master-fluid')

@section('head')

	<link rel="stylesheet" type="text/css" href="/css/manager/players.css">
	<link rel="stylesheet" type="text/css" href="/css/sideBar.css">

@stop

@section('content')

	@include('partials.sidebar')


	<div class="col-md-offset-3 col-md-8">
		
		<h3>Players</h3>

		<hr>


		<a class="btn btn-warning pull-right add-button" href="/manage/add/player"><b>Add A Player</b></a>
		<a class="btn btn-warning pull-right add-button" href="/manage/add/role"><b>Add A Role</b></a>
		<a class="btn btn-warning pull-right add-button" href="/manage/formation"><b>Formation</b></a>

		<div class="col-md-11">
			
			<h4>
				Your Players
			</h4>

			@if ( count($players) )
				<table class="players table col-md-12">
					
					<thead>
						<td colspan="1" class="col-md-1">
							Position
						</td>

						<td colspan="7">
							Player's name
						</td>

						<td colspan="4">
							Weekly Wages
						</td>

					    <td colspan="3">
							Actions
						</td>

					</thead>


					@foreach( $players as $player )
						<tr>
							<td colspan="1">
								<span class="role">{{ $player->role->name }}</span>
							</td>

							<td colspan="7">
								{{ $player->jersey_no }}. {{ $player->present()->fullName }}

								@if ( $player->captain() )
									(c)
								@endif

								@if ( $player->injury )
									<b>{{ '(Injured)'  }}</b>
								@endif
							</td>

							<td colspan="4">
								$ {{ $player->weekly_wages }}
							</td>

							<td colspan="3">
								<a href="/manage/update/player/{{ $player->id  }}">Update</a> |
								<a href="/manage/view/player/{{ $player->id  }}">View</a>
							</td>

						</tr>
					@endforeach

				</table>

			@else

				<p>
					No players have been added! Add some...
				</p>

			@endif

		</div>



	</div>

@stop