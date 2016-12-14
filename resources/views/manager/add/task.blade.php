@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/manager/add/task.css">
    <link rel="stylesheet" href="/css/sideBar.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8">

        <h2>Add A Task</h2>

        <hr>

        <form class="col-md-6" action="/manage/add/task/store" method="post">

            {{ csrf_field()  }}

            <label for="name">
                Name
            </label>

            <input type="text" name="name">
            <br>
            <br>

            <label for="description">
                Description
            </label>

            <textarea class="md-textarea" name="description"></textarea>
            <br>
            <br>

            <label for="time">
                When It Needs To Be Done?
            </label>

            <input type="datetime-local" name="time">
            <br>
            <br>
            <br>

            <button class="btn btn-blue-grey" type="submit">Add</button>

        </form>

    </div>

@stop