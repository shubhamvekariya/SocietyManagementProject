@push('css')
    <link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
@endpush

    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="Email" value='@if(isset($staff->email)){{ $staff->email }}@endif'>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Name" value='@if(isset($staff->name)){{ $staff->name }}@endif'>
        </div>
        <div class="form-group col-md-6">
            <label>Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="age">Age</label>
            <input id="age" name="age" type="number" class="form-control" placeholder="Age" value="@if(isset($staff->age)){{ $staff->age }}@endif">
        </div>
        <div class="form-group col-md-6">
            <label for="phoneno">Phone Number</label>
            <input id="phoneno" name="phoneno" type="text" class="form-control" placeholder="Phoneno" value="@if(isset($staff->phoneno)){{ $staff->phoneno }}@endif">
        </div>
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <select class="form-control" id="position" name="position">
            <option></option>
            @role('committeemember')
                <option value="security">Security</option>
            @endrole
            <option value="staff">Staff</option>
        </select>
    </div>
    <div class="form-group" id="workgroup">
        <label for="work">Work</label>
        <select class="form-control" id="work" name="work">
            <option></option>
            <option value="maid">Maid</option>
            <option value="driver">Driver</option>
        </select>
    </div>
    <div class="form-group">
        <label for="usage">Usage</label>
        <select class="form-control" id="usage" name="usage">
            <option></option>
            @role('committeemember')
                <option value="society">Society</option>
            @endrole
        </select>
    </div>

@push('script')
    <!-- Select2 -->
    <script src="{!! asset('/js/select2.full.min.js') !!}"></script>
    <script>
        $(document).ready(function(){
            $("#gender").select2({
                placeholder: "Select a gender",
                allowClear: true
            });
            $("#position").select2({
                placeholder: "Select a position",
                allowClear: true
            });
            $("#work").select2({
                placeholder: "Select a work",
                allowClear: true
            });
            $("#usage").select2({
                placeholder: "Select a usage",
                allowClear: true
            });
            $('#position').on("change", function (e) {
                var position = $('#position').find(':selected').val();
                if(position == "security")
                {
                    $('#usage').val('').trigger('change');
                    $('#workgroup').hide();
                }
                else
                    $('#workgroup').show();
                if(position == "staff")
                {
                    var newOption = new Option('Personal','personal', false, false);
                    $('#usage').append(newOption);
                }
                else
                    $("#usage option[value='personal']").remove();
            });
        });
    </script>
@endpush
