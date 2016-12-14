@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/installNav.css">
    <link rel="stylesheet" href="/css/web/partials/chat.css">
    <link rel="stylesheet" href="/css/partials/notifications.css">
    <link rel="stylesheet" href="/css/web/fanclub.css">
@stop

@section('content')

    @include('partials.nav')

    <div class="col-md-12 wrapper">

        <div class="col-md-6 col-md-offset-2">

            <h2>Groups</h2>
            <hr>

            @if (Auth::user())
                <a class="btn btn-indigo pull-right" href="/groups/create">Create Group</a>
            @endif
            <div class="col-md-12">
                <table class="table">

                    <thead>
                        <tr>
                            <td class="col-md-7">
                                Name
                            </td>

                            <td class="col-md-3">
                                Members
                            </td>

                            <td class="col-md-2">

                            </td>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach( $groups as $group )

                            <tr>
                                <td class="col-md-7">
                                    <p>
                                        <a href="/group/{{ $group->id  }}">
                                            {{ $group->name  }}
                                        </a>
                                    </p>
                                </td>

                                <td class="col-md-3">
                                    <p>
                                        {{ $group->members  }}
                                    </p>
                                </td>

                                <td class="col-md-2">
                                    @if ( Auth::user() )
                                        @if ( $group->admin != Auth::user()->id )
                                            @if ( $member = $group->checkUserIfAdded() )
                                                @if ( $member->accepted )
                                                    <p>Joined!</p>
                                                @else
                                                    <p>Request Sent!</p>
                                                @endif

                                            @else
                                                <form action="/groups/join/request/{{ $group->id  }}" method="post">
                                                    {{ csrf_field()  }}
                                                    <button class="btn btn-sm btn-brown join-button">Join</button>
                                                </form>
                                            @endif

                                        @else
                                            <p>Your Group!</p>
                                        @endif
                                    @endif

                                </td>

                            </tr>

                        @endforeach


                    </tbody>

                </table>

            </div>
        </div>

        <div class="col-md-4">
            <h3>
                Notifications
            </h3>
            <hr>
            @if ( count($notifications) )
                @foreach( $notifications as $noti )

                    <div class="notification<?php echo (!$noti->seen)? ' unseen': ''; ?>">
                        <p>
                            {{ $noti->info  }}
                        </p>

                        <b>{{ $noti->created_at->diffForHumans()  }}</b>

                    </div>

                @endforeach
            @else
                <h5>
                    No Notification!
                </h5>
            @endif

        </div>

        <div class="chat">

        </div>

    </div>
@stop

@section('script')
    <script>

        $.ajax({
            url : 'ajax/see-notification.php',
            data : {
                'type' : 'see-notification'
            },
            type : 'post',
            success : function (data)
            {
                console.log(data);
            },
        });

    </script>
@stop