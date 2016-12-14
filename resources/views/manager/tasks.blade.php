@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/manager/tasks.css">
    <link rel="stylesheet" href="/css/sideBar.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8">

        <div class="row">

            <h2 class="pull-left">
                My Tasks
            </h2>

            <a class="pull-right btn  btn-danger" href="/manage/tasks/trash">
                Trash ({{ $trash_count  }})
            </a>

        </div>

        <hr>

        <div class="col-md-12">

            <div class="col-md-8">

                <div class="row">
                    <p class="pull-left"><b>Today</b> : {{ $today  }}</p>
                    <a href="/manage/add/task" class="pull-right btn btn-deep-purple">Add A Task</a>
                </div>


                <div class="row">

                    @if (count($tasks))
                        @foreach( $tasks as $task )

                            @if($task->getRemainTime('time') > 0)

                                <div class="task col-md-5">
                                    <h4>
                                        {{ $task->name  }}
                                    </h4>
                                    <hr>
                                    <p class="description">
                                        {{ $task->description  }}
                                    </p>

                                    <p class="time">
                                        <b>{{ $task->getRemainTime('time')  }} To Go</b>
                                    </p>

                                    <p class="actions">
                                        <a href="/manage/view/task/{{ $task->id  }}" title="">
                                            View
                                        </a>

                                        <a href="/manage/delete/task/{{ $task->id  }}" title="Add To The Trash">
                                            Throw
                                        </a>

                                    </p>

                                </div>

                            @else

                                <?php $task->moveToTrash() ?>

                            @endif

                        @endforeach
                    @else
                        <h3>
                            No Task Have Been Added Yet!
                        </h3>
                    @endif



                </div>

            </div>

            <div class="col-md-4 saved-tasks">

                <h3>Recent Activities</h3>

                <hr>

                @if ( count($activities) )
                    <ol class="activities">

                        @foreach( $activities as $activity )
                            <li>{{ $activity->activity  }}</li>
                        @endforeach

                    </ol>
                @else
                    <p>No Activities!... -_-</p>
                @endif

            </div>

        </div>




    </div>

@stop