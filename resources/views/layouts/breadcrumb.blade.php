<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>@yield('breadcrumb-title')</h2>
        <ol class="breadcrumb">
            @yield('breadcrumb-item')
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="" class="btn btn-primary">This is action area</a>
        </div>
    </div>
</div>

@if (Session::has('approvesuccess'))
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ Session::get('approvesuccess') }}</strong>
    </div>
@endif
@if (Session::has('approveerror'))
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ Session::get('approveerror') }}</strong>
    </div>
@endif

@if (Session::has('approvevisitorsuccess'))
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ Session::get('approvevisitorsuccess') }}</strong>
    </div>
@endif
@if (Session::has('approvevisitorerror'))
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ Session::get('approvevisitorerror') }}</strong>
    </div>
@endif
