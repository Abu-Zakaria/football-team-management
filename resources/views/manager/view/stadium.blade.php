@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/sideBar.css">
    <link rel="stylesheet" href="/css/manager/view/stadium.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8 wrapper">

        <h2>View Stadium</h2>

        <hr>

        <div class="col-md-12">
            <div class="col-md-4">
                <h3>Details</h3>

                <p>Name - {{ $stadium->name  }}</p>
                <p>Seats - {{ $stadium->seats  }}</p>

                <a class="btn btn-warning" href="/manage/update/stadium/{{ $stadium->id }}">Update Details</a>

            </div>

            @if ( $stadium->picture )
                <img class="col-md-8 photo  img-responsive" src="/uploads/manager/stadium/{{ $stadium->picture  }}" alt="">
            @endif
        </div>

        <div class="col-md-12">

            <h3>
                Description
            </h3>
            <hr>

            @if ($stadium->description)

                <p>{{ $stadium->description  }}</p>

            @else

                <p class="warning col-md-6">No Description Has Been Added Yet! <br> <a href="/manage/update/stadium/{{ $stadium->id  }}"> Add One</a></p>

            @endif

        </div>



    </div>

@stop