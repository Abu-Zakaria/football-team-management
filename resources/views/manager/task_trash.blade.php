@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/manager/tasks_trash.css">;
    <link rel="stylesheet" href="/css/sideBar.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8">

        <div class="row">

            <h2>
                Trashes
            </h2>

            <hr>

        </div>

        <div class="row col-md-10">

            <table class="table table-responsive">

                <thead>
                        <tr>
                            <td class="col-md-5">
                                Task Name
                            </td>

                            <td>
                                Deleted At
                            </td>
                            
                            <td>
                                Actions
                            </td>
                            
                        </tr>
                </thead>

                <tbody>
                    @foreach( $trashes as $task )

                        <tr>
                            <td class="col-md-5">
                                {{ $task->name  }}
                                @if ( $task->getRemainTime('time') <= 0 )
                                    (Out Of Time, Can't Be Restored!)
                                @endif
                            </td>

                            <td>
                                {{ $task->created_at->diffForHumans() }}
                            </td>
                            
                            <td>
                                @if ( $task->getRemainTime('time') > 0 )
                                    <a href="/manage/restore/task/{{$task->id}}">Restore</a>
                                    |
                                @endif
                                <a href="/manage/delete/trash/task/{{ $task->id  }}">Delete Forever</a>
                            </td>

                        </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

    </div>


@stop