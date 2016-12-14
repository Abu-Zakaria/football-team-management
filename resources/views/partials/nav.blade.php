
<div class="nav-bar col-md-12">
    <div class="logo col-md-3">
        Logo Area
    </div>

    <div class="col-md-6 menu-area">

        <a href="/">Home</a>
        <a href="/team">Our Team</a>
        <a href="/fanclubs">Fan Clubs</a>
        <a href="/contact">Contact Us</a>
        <a href="/about">About</a>

    </div>

    <div class="col-md-3 auth-area">
        @if (Auth::user())
            <p class="pull-left first_name">
              Hi,  {{ Auth::user()->first_name  }}!
            </p>
            <a href="/logout">Log Out</a>
        @else
            <a href="/login">Log In</a>
            <a href="/signup">Sign Up</a>
        @endif
    </div>

</div>