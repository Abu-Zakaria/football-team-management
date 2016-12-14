@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/sideBar.css">
    <link rel="stylesheet" href="/css/manager/set/injury_time.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8">

        <h2>Set The Injury Time</h2>
        <hr>

        <form class="col-md-5" action="/manage/set/injury_time/{{ $player->id  }}" method="post">
            {{ csrf_field()  }}

            <label for="time">
                Time
            </label>

            <input type="date" name="time">
            <br>
            <br>
            @if ( $injury )
                Current Relieve Time - {{ $injury->getRemainTime('time')  }}
            @endif
            <br>
            <br>
            <br>

            <button class="btn btn-dark-green">Set</button>

        </form>

    </div>
@stop