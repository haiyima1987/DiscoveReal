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
        <a class="navbar-brand" href="#">DiscoveReal</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navList" id="bs-sidebar-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{ route('admin.users') }}">Users
                    <div class="sideIcon pull-right"><i class="fa fa-home" aria-hidden="true"></i></div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.posts') }}">Posts
                    <div class="sideIcon pull-right"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.news') }}">News
                    <div class="sideIcon pull-right"><i class="fa fa-globe" aria-hidden="true"></i></div>
                </a>
            </li>
            <li>
                <a href="{{ route('user.viewProfile') }}">My Profile
                    <div class="sideIcon pull-right"><i class="fa fa-user" aria-hidden="true"></i></div>
                </a>
            </li>
        </ul>
    </div>
</nav>