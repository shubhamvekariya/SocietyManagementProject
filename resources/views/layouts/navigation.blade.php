<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" width="70px" height="70px" src="{!! asset('images/undraw_profile.svg') !!}" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold text-uppercase">
                            @if (Auth::guard('society')->check())
                                {{ Auth::guard('society')->user()->society_name }}
                            @endif
                        </span>
                        <span class="text-muted text-xs block text-uppercase">
                            @if (Auth::guard('society')->check())
                                {{ Auth::guard('society')->user()->secretary_name }}
                            @endif
                            @if (Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                            <b class="caret"></b>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    SC+
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
        @role('secretary','society')
            <li>
                <a href="#"><i class="fa fa-users"></i><span class="nav-label">Member</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('society.needapprove') }}">Approve Member</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('society.cmembers') }}"><i class="fa fa-user-circle-o"></i><span
                        class="nav-label">Committee Member</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user-circle-o"></i><span class="nav-label">Rules</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('society.rule') }}">Add Rules</a></li>
                    <li><a href="{{ route('society.all_rule') }}">Manage Rules</a></li>
                </ul>
            </li>
        @else
        @role('member')
            <li>
                <a href="#"><i class="fa fa-users"></i><span class="nav-label">Family Member</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('member.addfamilymem') }}">Add Family Mem</a></li>
                    <li><a href="{{ route('member.allfamilymem') }}">Manage Family Mem</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-eye"></i><span class="nav-label">Visitors</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('member.needapprovevisitor') }}">Approve Visitor</a></li>
                    <li><a href="{{ route('member.visitors') }}">See Visitor Records</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-shield"></i><span class="nav-label">Security & Staff</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('member.staffs.create') }}">Add Staff</a></li>
                    <li><a href="{{ route('member.staffs.index') }}">Manage Staff</a></li>
                    <li><a href="#">Monthly Attendence</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-calendar"></i><span class="nav-label">Event/Assets</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('member.assets.create')}}">Book Assets</a></li>
                    <li><a href="{{route('member.assets.index')}}">View Assets</a></li>
                </ul>
            </li>
            @role('committeemember')

                <li>
                    <a href="#"><i class="fa fa-user-circle-o"></i><span class="nav-label">Meeting</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('member.meetings.create')}}">Add Meeting</a></li>
                        <li><a href="{{route('member.meetings.index')}}">Manage Meeting</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sticky-note"></i><span class="nav-label">Notice</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('member.notices.create')}}">Add Notice</a></li>
                        <li><a href="{{route('member.notices.index')}}">All Notice</a></li>

                    </ul>
                </li>

            @endrole
            @else

            @role('security')
            <li>
                <a href="#"><i class="fa fa-eye"></i><span class="nav-label">Visitors</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('staff.visitors.create') }}">Add Visitor</a></li>
                    <li><a href="{{ route('staff.visitors.index') }}">Manage Visitor</a></li>
                    <li><a href="{{ route('staff.visitors.allvisitors') }}">See all Visitor</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-car"></i><span class="nav-label">Parking</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('staff.visitors.parkings') }}">View Parking Details</a></li>
                </ul>
            </li>
        @else
            <li>
                <a href="#"><i class="fa fa-building"></i><span class="nav-label">Apartment</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Add Flats</a></li>
                    <li><a href="#">Manage Flats</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sticky-note"></i><span class="nav-label">Bills</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Add Bills</a></li>
                    <li><a href="#">Manage Bills</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-book"></i><span class="nav-label">Complaints</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">All Complaints</a></li>
                    <li><a href="#">Resolved</a></li>
                    <li><a href="#">In progress</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-calendar"></i><span class="nav-label">Event/Assets</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Book Assets</a></li>
                    <li><a href="#">View Assets</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-search"></i><span class="nav-label">Search</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Search Visitor</a></li>
                    <li><a href="#">Search member</a></li>
                    <li><a href="#">Search Staff</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-address-book-o"></i><span class="nav-label">Reports</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-fire-extinguisher"></i><span class="nav-label">Emergency Button</span></a>
            </li>
        @endrole
        @endrole
        @endrole
        </ul>
    </div>
</nav>
