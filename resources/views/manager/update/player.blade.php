@extends('master-fluid')

@section('head')
    <link rel="stylesheet" href="/css/manager/update/player.css">
    <link rel="stylesheet" href="/css/sideBar.css">
@stop

@section('content')

    @include('partials.sideBar')

    <div class="col-md-offset-3 col-md-8">

        <h2>Update Details</h2>

        <hr>

        <form class="col-md-6" action="/manage/update/player/{{ $player->id  }}/edit" method="post" enctype="multipart/form-data">

            {{ csrf_field()  }}

            <label for="jersey_no">
                Jersey Number
            </label>

            <input type="number" name="jersey_no" value="{{ $player->jersey_no  }}">

            @if (Session::exists('jersey_no'))
                {{ Session::get('jersey_no')  }}
            @endif
            <br>
            <br>
            <label for="first_name">
                First Name
            </label>

            <input type="text" name="first_name" value="{{ $player->first_name  }}">
            <br>
            <br>

            <label for="last_name">
                Last Name
            </label>

            <input type="text" name="last_name" value="{{ $player->last_name  }}">
            <br>
            <br>

            <label for="wages">
                Weekly Wage
            </label>

            <input type="number" name="wages" value="{{ $player->weekly_wages  }}">
            <br>
            <br>

            <label for="photo">
                @if( $player->picture )
                    Update The Existing Photo
                @else

                    Add A New Photo

                @endif
            </label>

            <input type="file" name="photo">
            <br>
            <br>

            <label for="skills">
                Skills
            </label>

            <input type="text" name="skills" value="{{ $player->skills  }}">

            <br>
            <br>

            <label for="role">
                Role
            </label>

            <select name="role">
                <option value="">Select</option>

                @foreach($roles as $role)
                    @if ( $role->id == $player->role->id )

                        <option value="{{ $role->id  }}" selected>{{ $role->name  }}</option>

                    @else

                        <option value="{{ $role->id  }}">{{ $role->name  }}</option>

                    @endif
                @endforeach
            </select>
            <br>
            <br>

            <label for="injury">
                Injury
            </label>

            <input type="checkbox" name="injury"
                @if ( $player->injury )
                    {{ "checked"  }}
                @endif
            >
            <br>
            <br>

            <label for="stamina">
                Stamina ( % )
            </label>

            <input type="number" min="0" max="100" name="stamina" value="{{ $player->stamina  }}">
            <br>
            <br>

            <button class="btn btn-primary">Update</button>

        </form>

    </div>

@stop