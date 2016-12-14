@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/installNav.css">
@stop

@section('content')

    @include('partials.nav')

    <div class="wrapper col-md-12">

        <div class="form col-md-offset-3 col-md-6">

            <h3>Create A New Group</h3>

            <hr>

            <form action="/groups/create/add" method="post" class="col-md-8">
                {{ csrf_field()  }}

                <label for="name">
                    Group Name
                </label>

                <input type="text" name="name">
                {{ $errors->first('name')  }}
                <br>
                <br>

                <label for="info">
                    Group Info
                </label>

                <textarea name="info" class="form-control"></textarea>
                <p style="color: #999;">Max : 255 characters</p>
                <br>
                <br>

                <button type="submit" class="btn btn-elegant">Create</button>

            </form>
        </div>

    </div>

@stop