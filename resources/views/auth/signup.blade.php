@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/installNav.css">
@stop

@section('content')

    @include('partials.nav')

    <div class="wrapper col-md-12">
        <div class="col-md-5 col-md-offset-3">
            <h3 class="">
                Sign Up
            </h3>
            <hr>
            <form action="/signup/create" method="post">

                {{ csrf_field()  }}

                <label for="first_name">
                    First Name
                </label>

                <input type="text" name="first_name" placeholder="John">
                {{ $errors->first('first_name')  }}

                <br>
                <br>

                <label for="last_name">
                    Last Name
                </label>
                <input type="text" name="last_name" placeholder="Doe">
                {{ $errors->first('last_name')  }}
                <br>
                <br>

                <label for="username">
                    Username
                </label>

                <input type="text" name="username" placeholder="JohnDoe">
                {{ $errors->first('username')  }}
                <br>
                <br>

                <label for="password">
                    Password
                </label>

                <input type="password" name="password" placeholder="******">
                {{ $errors->first('password')  }}

                <br>
                <br>

                <label for="email">
                    Your Email
                </label>

                <input type="email" name="email" placeholder="john.doe@gmail.com">
                {{ $errors->first('email')  }}
                <br>
                <br>

                <label for="date_of_birth">
                    Date Of Birth
                </label>
                <input type="date" name="date_of_birth">
                {{ $errors->first('date_of_birth')  }}
                <br>
                <br>
                <br>

                <button class="btn btn-deep-purple">Sign Up</button>

            </form>
        </div>

    </div>

@stop