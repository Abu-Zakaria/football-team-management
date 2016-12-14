@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/manager/update/stadium.css">
    <link rel="stylesheet" href="/css/sideBar.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8">

        <h2>Update Details</h2>

        <hr>

        <form class="col-md-6" action="/manage/update/stadium/{{ $stadium->id  }}/edit" method="post" enctype="multipart/form-data">

            {{ csrf_field()  }}

            <label for="name">
                Stadium Name
            </label>

            <input type="text" name="name" value="{{ $stadium->name  }}">
            {{ $errors->first('name')  }}
            <br>
            <br>

            <label for="seats">
                Number of Seats
            </label>

            <input type="number" name="seats" value="{{ $stadium->seats  }}">
            {{ $errors->first('seats')  }}
            <br>
            <br>

            <label for="description">
                Description
            </label>

            <textarea class="form-control description" name="description">{{ $stadium->description  }}</textarea>
            <br>
            <br>

            <input type="checkbox" name="construction" <?= ($stadium->under_construction)? 'checked': '' ?>>

            <label for="construction">
                Under Construction
            </label>

            <br>
            <br>

            @if ($stadium->picture)

                <label for="photo">
                    Update The Current Photo
                </label>

            @else

                <label for="photo">
                    Add A Photo ( No Photo Have Been Added Yet! )
                </label>

            @endif
            <br>
            <br>
            <input type="file" name="photo">

            <br>
            <br>
            <br>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>

    </div>

@stop