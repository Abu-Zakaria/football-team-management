@extends('master-fluid')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/manager/dashboard.css">
	<link rel="stylesheet" type="text/css" href="/css/sideBar.css">
@stop

@section('content')

	@include('partials.sideBar')

	<div class="col-md-offset-3 col-md-8 wrapper">
		
		<h3>Dashboard</h3>

		<hr>

		<div class="info col-md-4">
			<h4>
				Players' Infos :
			</h4>
			<hr>
				<ul class="pull-left">

					<li>
						Total Players : 
					</li>

					<li>
						Injured Players :
					</li>

					<li>
						100% Fitted Players : 
					</li>

				</ul>

				<ul class="pull-right">

					<li>
						{{ $players }}
					</li>

					<li>
						{{ $injuredPlayers }}
					</li>

					<li>
						{{ $fitPlayers }}
					</li>
					
				</ul>
		</div>

		<div class="col-md-6 info">

			<h4>
				Pending Tasks That Need To Be Done :
			</h4>

			<hr>

			<table class="table table-responsive tasks">
				<thead>
					<tr>
						<td>
							Name
						</td>

						<td>
							Time Remaining
						</td>

					</tr>
				</thead>

				<tbody>

					@foreach( $tasks as $task )

						<tr>
							<td>
								<a href="/manage/view/task/{{ $task->id  }}">
									{{ $task->name  }}
								</a>
							</td>

							<td>
								@if ( $task->getRemainTime('time') )
									{{ $task->getRemainTime('time')  }}
								@else
									<b>Time's Up! It is moved to the trash!</b>
									<?php $task->moveToTrash() ?>
								@endif

							</td>

						</tr>

					@endforeach

				</tbody>

			</table>

		</div>

		<div class="col-md-5">
			
			<h4>Finance : </h4>
			<hr>

			<ul class="pull-left">
				<li>
					<p>
						Total Weekly Wages :
					</p>					
				</li>


				<li>
					<p>
						Average Wages Per Player : 
					</p>					
				</li>

			</ul>



			<ul class="pull-right">
				<li>
					
					<p class="pull-right">
						{{ $wages }} K
					</p>

				</li>

				<li>
					<p class="pull-right">
						{{ $average }} K
					</p>					
				</li>
			
			</ul>

		</div>



	</div>

@stop