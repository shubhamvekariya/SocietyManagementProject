<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" width="70px" height="70px" src="{!! asset('images/undraw_profile.svg') !!}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold text-uppercase">
                            @if(Auth::guard('society')->check())
                                {{Auth::guard('society')->user()->society_name}}
                            @endif
                        </span>
                        <span class="text-muted text-xs block text-uppercase"> 
                            @if(Auth::guard('society')->check())
                                {{Auth::guard('society')->user()->secretary_name}}
                            @endif
                        <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Contacts</a></li>
                        <li><a class="dropdown-item" href="#">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    AP+
                </div>
            </li>

            
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>


            <li>
                <a href="#"><i class="fa fa-users"></i><span class="nav-label">Member</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Add Member</a></li>
                    <li><a href="#">Manage Member</a></li>
                   
                    
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-building"></i><span class="nav-label">Apartment</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Add Flats</a></li>
                    <li><a href="#">Manage Flats</a></li>
                    
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-receipt"></i><span class="nav-label">Bills</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Add Bills</a></li>
                    <li><a href="#">Manage Bills</a></li>
                    
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-globe"></i><span class="nav-label">Complaints</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">All Complaints</a></li>
                    <li><a href="#">Resolved</a></li>
                    <li><a href="#">In progress</a></li>
                    
                </ul>
            </li>
           
            <li>
                <a href="#"><i class="fa fa-eye"></i><span class="nav-label">Visitors</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Add Visitor</a></li>
                    <li><a href="#">Manage Visitor</a></li>
                    
                    
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-globe"></i><span class="nav-label">Security & Staff</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Add Staff</a></li>
                    <li><a href="#">Manage Staff</a></li>
                    <li><a href="#">Monthly Attendence</a></li>
                    
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-globe"></i><span class="nav-label">Event/Assets</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Book Assets</a></li>
                    <li><a href="#">View Assets</a></li>
                    
                    
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-car"></i><span class="nav-label">Parking</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">View Parking Details</a></li>
                    <li><a href="#">Manage Parking</a></li>
                    
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-fire-extinguisher"></i><span class="nav-label">Emergency Button</span></a>
                
            </li>

            <li>
                <a href="#"><i class="fa fa-user-circle-o"></i><span class="nav-label">Secretary</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Add Committee Member</a></li>
                    <li><a href="#">ManageCommittee Member</a></li>
                    <li><a href="#">Add Rules</a></li>
                    <li><a href="#">Manage Rules</a></li>
                    
                    
                </ul>
            </li>
           
           
           


            <li>
                <a href="#"><i class="fa fa-search"></i><span class="nav-label">Search</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Search Visitor</a></li>
                    <li><a href="#">Search member</a></li>
                    <li><a href="#">Search Staff</a></li>
                    
                    
                </ul>
            </li>
           
           
            <li>
                <a href="#"><i class="fa fa-globe"></i><span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    
                </ul>
            </li>
           
           
           
        </ul>

    </div>
</nav>
