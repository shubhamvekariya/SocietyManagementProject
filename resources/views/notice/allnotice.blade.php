@extends('layouts.app')
@section('title')
    All Notice
@endsection

@push('css')
    <link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
    <style>
        .center {
            display: flex;
            justify-content: center;
        }

    </style>
@endpush
@section('breadcrumb-title')
    All Notice
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Notice</strong>
    </li>
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>{{ session()->get('success') }}</strong>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>{{ session()->get('error') }}</strong>
        </div>
    @endif
    @php
    function secondsToWord($seconds)
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
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <ul class="notes">
                    @foreach ($notices as $notice)
                        <li>
                            <div>

                                @php
                                    $created = strtotime($notice['created_at']);
                                    $seconds = time() - $created;
                                    $timeinword = secondsToWord($seconds);
                                @endphp

                                <small>{{ $timeinword }} ago</small>
                                <h4><strong>{{ $notice->title }}</strong></h4>
                                <p class="text-truncate" style="word-break: break-all;">{{ $notice->description }}</p>

                                <form action="{{ route('member.notices.destroy', [$notice->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="{{ route('member.notices.edit', [$notice->id]) }}"
                                        class="btn btn-info mr-5 mb-4"><i class="fa fa-pencil-square-o "></i></a>
                                    <button class="btn btn-danger float-right" style="margin-top: 48px;" type="submit"><i
                                            class="fa fa fa-trash-o"></i></button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <br>

    <div class="center" style="align:center;">{{ $notices->links() }}</div>
@endsection
@push('script')
    <script>
        $(function() {
            $('.notice').addClass('active');
            $('.notice ul').addClass('in');
            $('.notice ul li:nth-child(2)').addClass('active');
        });
    </script>
@endpush
