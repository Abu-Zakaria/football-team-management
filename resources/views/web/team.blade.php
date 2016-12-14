@extends('master-fluid')

@section('head')

	<link rel="stylesheet" type="text/css" href="/css/nav.css">
	<link rel="stylesheet" type="text/css" href="/css/installNav.css">
	<link rel="stylesheet" type="text/css" href="/css/web/team.css">

@stop

@section('content')

	@include('partials.nav')

	<div class="col-md-offset-1 col-md-10 wrapper">

		<h2>Our Team</h2>

		<hr>

		<div class="col-md-6">
			<table class="table">
				
				<thead>
					<tr>
						<td class="col-md-1">
							Position
						</td>

						<td class="col-md-7">
							Name
						</td>

						<td class="col-md-4">
							Skills
						</td>
					</tr>
				</thead>

				<tbody>
					@foreach ( $players as $player )

						<tr>
							<td class="col-md-1">
								{{ $player->role->name }}
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
		</div>
		
		<div class="col-md-4 col-md-offset-1 set-piece">
			
			<h4>
				Set Piece Takers
			</h4>
			<hr>

			<ol>
				
				@foreach ( $freeKickers as $kicker )

					<li>
						{{ $kicker->player->present()->fullName }}
					</li>

				@endforeach

			</ol>

		</div>

	</div>

@stop