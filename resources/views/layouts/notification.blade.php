@php
function secondsToWords($seconds)
{
    $days = (int) ($seconds / 86400);
    $plural = $days > 1 ? 'days' : 'day';
    $hours = (int) (($seconds - $days * 86400) / 3600);
    $mins = (int) (($seconds - $days * 86400 - $hours * 3600) / 60);
    $secs = (int) ($seconds - $days * 86400 - $hours * 3600 - $mins * 60);
    if ($mins == 0) {
        return sprintf('%d sec', $secs);
    } elseif ($hours == 0) {
        return sprintf('%d min, %d sec', $mins, $secs);
    } elseif ($days == 0) {
        return sprintf(' %d hours, %d min', $hours, $mins, $secs);
    } else {
        return sprintf("%d $plural, %d hours", $days, $hours, $mins, $secs);
    }
}
@endphp
<div id="right-sidebar">
    <div class="sidebar-container">
        <div class="tab-content">
            <div id="tab" class="tab-pane active">
                <div class="sidebar-title" style="background-color:#2f4050;color:#a7b1c2;">
                    <h3> <i class="fa fa-comments-o"></i> Latest Notification</h3>
                    <small><i class="fa fa-tim"></i> You have {{ Auth::user()->unreadNotifications->count() }} new
                        message.</small>
                </div>
                <div>
                    @foreach (Auth::user()->unreadNotifications as $notification)
                        <div class="sidebar-message font-weight-bold">
                            @role('security')
                            <a href="{{ route('staff.markasread', $notification->id) }}">
                            @else
                                @role('member')
                                <a href="{{ route('member.markasread', $notification->id) }}">
                                @else
                                    @role('secretary')
                                    <a href="{{ route('society.markasread', $notification->id) }}">
                                        @endrole
                                        @endrole
                                        @endrole
                                        <div class="media-body">
                                            {!! $notification->data['data'] !!}
                                            <br>
                                            @php
                                                $created = strtotime($notification['created_at']);
                                                $seconds = time() - $created;
                                                $timeinword = secondsToWords($seconds);
                                            @endphp
                                            <small class="text-muted">{{ $timeinword }} ago</small>
                                        </div>
                                    </a>
                        </div>
                    @endforeach
                </div>
                <li class="dropdown-divider"></li>
                <div class="sidebar-title" style="background-color:#2f4050;color:#a7b1c2;">
                    <h3> <i class="fa fa-comments-o"></i> Readed Notification</h3>
                </div>
                <div>
                    @foreach (Auth::user()->readNotifications as $notification)
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="media-body">
                                    {!! $notification->data['data'] !!}
                                    <br>
                                    @php
                                        $created = strtotime($notification['created_at']);
                                        $seconds = time() - $created;
                                        $timeinword = secondsToWords($seconds);
                                    @endphp
                                    <small class="text-muted">{{ $timeinword }} ago</small>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</div>
