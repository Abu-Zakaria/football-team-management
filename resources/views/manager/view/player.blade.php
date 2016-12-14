@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/sideBar.css">
    <link rel="stylesheet" href="/css/manager/view/player.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8">

        <h2>Player Details</h2>

        <hr>

        <div class="col-md-8 details">

            <p><b> Name : </b> {{ $player->present()->fullName  }}</p>

            <p><b>Weekly Wage : </b> $ {{ $player->weekly_wages / 1000 }}K </p>

            <p><b>Monthly Wage : </b> ${{ ( $player->weekly_wages * 4 ) / 1000 }}K ( Estimate ) </p>

            <p><b>Goals : </b> N/A </p>

            <p><b>Assists : </b> N/A </p>

            <p><b>Health : </b> {{ $player->stamina  }}% </p>

            <p><b>Injury :</b>
                @if ( $player->injury )
                    Yes -
                    <a  href="/manage/set/injury_time/{{ $player->id  }}"><u>
                            @if ($injury)
                                Update The
                            @else
                                Set A
                            @endif

                        Time For Fitness</u></a>
                @else
                    No
                @endif
            </p>

            @if ( $injury )
                <p>
                    <b>When This Player Will Be Okay : </b>
                    {{ $injury->getRemainTime('time')  }}
                </p>
            @endif

            <p><b>Skills : </b> {{ $player->skills  }} </p>

            <a class="btn btn-warning" href="/manage/update/player/{{ $player->id  }}">Update Details</a>

        </div>

        @if( $player->picture )

            <img class="col-md-3 col-md-offset-1 photo" src="/uploads/players/{{ $player->picture  }}" alt="{{ $player->present()->fullName  }}">

        @endif


        <div class="col-md-8">

        </div>

    </div>

@stop