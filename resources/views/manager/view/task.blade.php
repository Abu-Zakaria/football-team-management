@extends("master-fluid")

@section('head')
    <link rel="stylesheet" href="/css/manager/view/task.css">
    <link rel="stylesheet" href="/css/sideBar.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8 wrapper">

        <h2>
            View Details
        </h2>

        <hr>

        <div class="row">

            <div class="task col-lg-5">

                <h4>
                    {{ $task->name  }}
                </h4>
                <hr>

                <p>
                    {{ $task->description  }}
                </p>
                <hr>
                <p>
                    <b>

                        @if ( $task->getRemainTime('time') > 0 )
                            {{ $task->getRemainTime('time')  }}
                        @else
                            Time's Up!
                        @endif

                    </b>
                </p>

            </div>

        </div>

        <div class="row col-lg-7">

            <h3>Comments</h3>

            <hr>

            <form action="/manage/comment/task/{{ $task->id  }}" method="post">

                {{ csrf_field()  }}

                <textarea name="comment" class="form-control textarea"></textarea>

                <button class="btn btn-brown">Add A Comment</button>

            </form>

            @if ( count($comments) )

                <div class="comments">

                    @foreach( $comments as $comment )

                        <div class="comment">
                            <p>
                                {{ $comment->comment  }}
                            </p>

                            <p class="time">
                                {{ $comment->created_at->diffForHumans()  }}
                            </p>
                        </div>

                    @endforeach

                </div>

            @else

                <h4>
                    No Comments Have Been Made Yet!
                </h4>

            @endif


        </div>

    </div>

@stop