@push('css')
    <link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endpush

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Complaint's Title:</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Title" name="title" value="@if(isset($complaint->title)){{ $complaint['title']}}@endif">
    </div>
</div>

<div class="form-group row">

    <label class="col-sm-2 col-form-label">Description:</label>

    <div class="col-lg-10"><textarea rows="3" class="form-control" placeholder="Enter Description"
            name="description">@if(isset($complaint->description)){{ $complaint['description']}}@endif</textarea></div>
</div>

<div class="form-group row">
    <label class="font-normal col-sm-2 col-form-label">Date & Time:</label>
    <div class="input-group date col-sm-10 ">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="reg_date"
            class="form-control" id="datetimepicker1" onClick="return current_Date();" placeholder="Registration Date"
            autocomplete="off">
    </div>
</div>


<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Select Category:</label>
    <div class="col-sm-10">

        <select class="form-control m-b" id="category" name="category">
            <option></option>
            <option value="Society">Society</option>
            <option value="Water">Water</option>
            <option value="Other">Other</option>
        </select>


    </div>
</div>

<div class="form-group row">

    <label class="col-sm-2 col-form-label">Remarks:</label>

    <div class="col-lg-10"><textarea rows="3" class="form-control" placeholder="Enter Remarks"
            name="remarks">@if(isset($complaint->remarks)){{ $complaint['remarks']}}@endif</textarea></div>
</div>


<div class="form-group row text-center">
    <div class="col-12">
        <button class="btn btn-primary btn-lg" type="submit">
            @if(isset($complaint['title'])) Edit
            @else Add
            @endif
        </button>
        <a class="btn btn-white btn-lg" href="{{ route('member.complaints.index') }}">Cancel</a>
    </div>
</div>


@push('script')

    <!--scripts-->
    <!-- iCheck -->
    <script src="{{ asset('js/icheck.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{!! asset('/js/select2.full.min.js') !!}"></script>
    <script>
        $(document).ready(function() {
            $("#category").select2({
                placeholder: "Select a Category",
                allowClear: true
            });
        });

    </script>
@endpush
