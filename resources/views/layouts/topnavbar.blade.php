<div class="row border-bottom">
    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to ISocietyClub</span>
            </li>
            @php
                function secondsToWords($seconds)
                {
                    $days = (int) ($seconds / 86400);
                    $plural = $days > 1 ? 'days' : 'day';
                    $hours = (int) (($seconds - $days * 86400) / 3600);
                    $mins = (int) (($seconds - $days * 86400 - $hours * 3600) / 60);
                    $secs = (int) ($seconds - $days * 86400 - $hours * 3600 - $mins * 60);
                    if($mins==0)
                        return sprintf("%d sec",$secs);
                    else if($hours==0)
                        return sprintf("%d min, %d sec", $mins, $secs);
                    else if($days==0)
                        return sprintf(" %d hours, %d min", $hours, $mins, $secs);
                    else
                        return sprintf("%d $plural, %d hours", $days, $hours, $mins, $secs);
                }
            @endphp
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="">
                    <i class="fa fa-bell"></i> <span
                        class="label label-primary">{{ Auth::user()->unreadNotifications->count() }}</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    @foreach (Auth::user()->unreadNotifications->take(3) as $notification)
                        <li>
                            @role('security')
                                <a href="{{ route('staff.markasread',$notification->id) }}">
                            @else
                            @role('member')
                                <a href="{{ route('member.markasread',$notification->id) }}">
                            @endrole
                            @endrole
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> {!! $notification->data['data'] !!}
                                    <br>
                                    @php
                                        $created =  strtotime($notification['created_at']);
                                        $seconds = time() - $created;
                                        $timeinword = secondsToWords($seconds);
                                    @endphp
                                    <span class="text-muted small">{{ $timeinword }} ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                    @endforeach
                    <li>
                        <div class="text-center link-block">
                            <a href="notifications.html" class="dropdown-item">
                                <strong>See All Notification</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    </nav>
</div>
