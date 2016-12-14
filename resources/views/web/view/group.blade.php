@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/installNav.css">
    <link rel="stylesheet" href="/css/partials/notifications.css">
@stop

@section('content')

    @include('partials.nav')

    <div class="col-md-12 wrapper">

        <div class="chat-box-wrapper col-md-offset-2 col-md-5">
            <h3>
                {{ $group->name  }}
            </h3>
            <hr>
            <div class="messages">

            </div>

            <textarea name="chat"></textarea>

        </div>

        <div class="notifications col-md-5">

            <h3>Notifications</h3>
            <hr>
            @if( count($notifications) )

                @foreach( $notifications as $noti )

                    <div class="notification<?php echo ( !$noti->seen )? ' unseen': '' ?> ">
                        <p>
                            {{ $noti->info  }}
                        </p>
                    </div>

                @endforeach

            @else
                <p>No Notifications for this group!</p>
            @endif

        </div>

    </div>

@stop