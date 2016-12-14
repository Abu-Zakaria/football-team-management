@extends('master')

@section('head')

	<link rel="stylesheet" type="text/css" href="/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="/css/manager/formation.css">

@stop

@section('content')

	@include('partials.sideBar')

	<div class="col-md-offset-2 col-md-10 wrapper">
		
		<h2>Team Formation</h2>
		<hr>

		<div class="row">
			
			<div class="col-md-8">
				<div class="col-md-12">
					@if( count($players) > 11 )

						<div class="col-md-3">
							
							<h4>
								All GKs
								<br>
								<br>
							</h4>

							<hr>

							@foreach ( $gks as $gk )

								<p>
									{{ $gk->present()->fullName }}
									@if ( $gk->captain() )
										(c)
									@endif
								</p>

							@endforeach

						</div>

						<div class="col-md-3">
							
							<h4>
								All Defenses
								<br>
								<br>
							</h4>
							<hr>

							@foreach ( $defenses as $def )

								<p>
									{{ $def->present()->fullName }}
									@if ( $def->captain() )
										(c)
									@endif
								</p>

							@endforeach

						</div>

						<div class="col-md-3">
							
							<h4>
								All Mid-Fielders
							</h4>
							<hr>

							@foreach ( $midfields as $mid )

								<p>
									{{ $mid->present()->fullName }}
									@if ( $mid->captain() )
										(c)
									@endif
								</p>

							@endforeach

						</div>

						<div class="col-md-3">
							
							<h4>
								All Attackers
								<br>
								<br>
							</h4>
							<hr>

							@foreach ( $attacks as $attacker )

								<p>
									{{ $attacker->present()->fullName }}
									@if ( $attacker->captain() )
										(c)
									@endif
								</p>

							@endforeach

						</div>

					@else

						<h3>
							Not Enough Players To Build Up A Formation!
						</h3>

						<a href="/manage/add/player">Add Some Players, Boss!</a>

					@endif		
				</div>

				<div class="col-md-12">
					
					<h3>Formation :</h3>
					<hr>

					<p>
						<b>
							Current Fomation :
						</b>

						@if ( $formation )

							<b>
								{{ $formation->formation }}
							</b>


						@else

							No Formation Have Been Choosed Yet, Boss!

						@endif

					</p>
						@if ( Session::has('info') )

							<div class="info col-md-12">
								{{ Session::get('info') }}
							</div>

						@endif
					<div class="col-md-4 formation">
						
						<form method="post" action="/manage/formation/add">
							{{ csrf_field() }}
							<div class="col-md-4">
								
								<label for="def">
									Defense
								</label>
								<input type="number" min="0" max="9" name="def">

							</div>
							
							<div class="col-md-4">
								
								<label for="mid">
									Midfield
								</label>
								<input type="number" min="0" max="9" name="mid">

							</div>

							<div class="col-md-4">
								
								<label for="att">
									Attack
								</label>
								<input type="number" min="0" max="9" name="att">

							</div>


							<div>
								<button type="submit" class="btn btn-md btn-unique">Format</button>
							</div>
							

						</form>
						

					</div>

					

				</div>	
			</div>
			

			<div class="col-md-4">
				
				<h4>
					Players' Role
				</h4>
				<hr>

				<div class="role col-md-12">
					<p>
						<b class="pull-left">
							Captain :
						</b>
						<b class="pull-right">
							
							@if ( $captain )

								{{ $captain->player->present()->fullName }}

							@else

								No Captain Has Been Choosed Yet!

							@endif

						</b>
					</p>
					<br>
					<br>

					<div class="row">
						
						<a class="btn btn-md btn-primary pull-right" href="/manage/add/captain">

							@if( $captain )

								Update

							@else

								Add A

							@endif

							Captain
						</a>

					</div>
				</div>

				
				<div class="free-kickers col-md-12">
				<hr>

					<p>
						<b>
							Set-Piece Takers :
						</b>
					</p>

					@if ( count($freeKickers) )

						<ol>
							@foreach ( $freeKickers as $kicker )

								<li>
									{{ $kicker->player->present()->fullName }}
									@if ( $kicker->player->captain() )

										(c)

									@endif
								</li>



							@endforeach

							<div class="row">
									
								<a class="pull-right btn btn-md btn-primary" href="/manage/formation/set-piece-takers">Add A Player</a>

							</div>

						</ol>

					@else

						<p>
							No Player Choosen Yet!
						</p>

						<div class="row">
							
							<a href="/manage/formation/set-piece-takers" class="pull-right btn btn-md btn-success">Choose</a>

						</div>

					@endif

				</div>

				<div class="col-md-12">
					
					<hr>

					<p>
						<b>
							Corner-Kick Takers :
						</b>
					</p>

					@if ( count($cornerKickers) )

						<ol>
							
							@foreach ( $cornerKickers as $kicker )

								<li>
									{{ $kicker->player->present()->fullName }}
									@if ( $kicker->player->captain() )

										(c)

									@endif
								</li>

							@endforeach

						</ol>

						<a href="/manage/formation/corner-kick-taker" class="pull-right btn btn-md btn-primary">Add Some More</a>

					@else

						<p>
							No Player Have Been Choosed Yet!
						</p>

						<div class="row">
							
							<a href="/manage/formation/corner-kick-taker" class="pull-right btn btn-md btn-primary">Choose</a>

						</div>

					@endif

				</div>

			</div>

		</div>
		

	</div>

@stop