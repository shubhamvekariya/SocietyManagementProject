@push('css')
    <link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
@endpush

<h3 class="mb-3">
    Visitor details
</h3>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Visitor's Name:</label>
    <div class="col-sm-10">
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Full Name">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Phone No:</label>
    <div class="col-sm-10">
        <input type="number" id="phoneno" name="phoneno" class="form-control" placeholder="Enter Phone No">

    </div>
</div>

<div class="form-group row"><label class="col-sm-2 col-form-label">Enter Address:</label>

    <div class="col-sm-10">
        <textarea cols="50" rows="3" class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>

    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Whom To Meet:</label>

    <div class="col-sm-10">
        <select class="form-control" id="member" name="member">
            <option></option>
            @foreach($members as $member)
                <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->name_or_number  }}@if($member->floor_no) - {{ $member->floor_no}}@endif)</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Reason To Meet:</label>

    <div class="col-sm-10"><input type="text" id="reason" name="reason"class="form-control" placeholder="Enter Reason">
    </div>
</div>

<div class="form-group row">
    <label class="font-normal col-sm-2 col-form-label">Entry Time:</label>
    <div class="input-group date col-sm-10">
        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span><input type="text"
            class="form-control" id="entryTime" name="entryTime" placeholder="Enter visitor entry date & time" />
    </div>
</div>
<hr />
<h3 class="mt-5 mb-3">
    Vehicle Parking details
</h3>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Vehicle Number:</label>

    <div class="col-sm-10">
        <input type="text" id="vehicle_no" name="vehicle_no" class="form-control"
            placeholder="Enter vehicle number">
    </div>

</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Type:</label>

    <div class="col-sm-10">
        <select class="form-control" id="type" name="type">
            <option></option>
            <option value="bike">Bike</option>
            <option value="car">Car</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Spot:</label>

    <div class="col-sm-10">
        <input type="text" id="spot" name="spot" class="form-control" placeholder="Enter Spot number/name">
    </div>
</div>
<div class="form-group row justify-content-md-center mt-5">
    <div class="col-sm-12 col-md-auto">
        <button class="btn btn-primary btn-lg mx-2" type="submit">Make entry</button>
        <a class="btn btn-white btn-lg mx-2">Cancel</a>

    </div>
</div>
@push('script')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#type").select2({
                placeholder: "Select a type",
                allowClear: true
            });
            $("#member").select2({
                placeholder: "Select a member",
                allowClear: true
            });
        });
    </script>
@endpush
