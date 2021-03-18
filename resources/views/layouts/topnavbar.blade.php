<div class="row border-bottom">
    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message"><marquee>Welcome to ISocietyClub</marquee></span>
            </li>
            <li class="dropdown">
                <a class="right-sidebar-toggle count-info">
                    <i class="fa fa-bell"></i> <span
                        class="label label-primary">{{ Auth::user()->unreadNotifications->count() }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    </nav>
</div>
