<nav class="navbar navbar-default sidebar" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-sidebar-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">DiscoveReal</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navList" id="bs-sidebar-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{ route('home') }}">Home
                    <div class="sideIcon pull-right"><i class="fa fa-home" aria-hidden="true"></i></div>
                </a>
            </li>
            <li>
                <a href="{{ route('news') }}">DR News
                    <div class="sideIcon pull-right"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                </a>
            </li>
            {{--<li>--}}
            {{--<a href="#">Messages<i class="fa fa-envelope pull-right" aria-hidden="true"></i></a>--}}
            {{--</li>--}}
            <li>
                <a href="{{ route('countries') }}">Destination
                    <div class="sideIcon pull-right"><i class="fa fa-globe" aria-hidden="true"></i></div>
                </a>
            </li>
            @if(Auth::check())
                <li>
                    <a href="{{ route('user.viewProfile') }}">My Profile
                        <div class="sideIcon pull-right"><i class="fa fa-user" aria-hidden="true"></i></div>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('user.signup') }}">Sign Up
                        <div class="sideIcon pull-right"><i class="fa fa-user-plus" aria-hidden="true"></i></div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.login') }}">Log In
                        <div class="sideIcon pull-right"><i class="fa fa-user" aria-hidden="true"></i></div>
                    </a>
                </li>
            @endif
            {{--<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings--}}
            {{--<i class="fa fa-caret-down" aria-hidden="true"></i>--}}
            {{--<i class="fa fa-cog pull-right" aria-hidden="true"></i></a>--}}
            {{--<ul class="dropdown-menu forAnimate" role="menu">--}}
            {{--<li><a href="#">Action</a></li>--}}
            {{--<li><a href="#">Another action</a></li>--}}
            {{--<li><a href="#">Something else here</a></li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li><a href="#">Separated link</a></li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li><a href="#">One more separated link</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </div>
</nav>