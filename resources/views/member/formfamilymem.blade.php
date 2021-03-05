@push('css')
    <link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
@endpush
<div class="ibox-content">

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
            <label class="col-sm-2 col-form-label">Name:</label>

           <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="@if(isset($family_mem->name)){{ $family_mem['name']}}@endif">
        </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label">Enter Age:</label>

           <div class="col-sm-10"><input type="text" class="form-control" placeholder="Enter Age" name="age" value="@if(isset($family_mem->age)){{ $family_mem['age']}}@endif">
           </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label">Contact Number:</label>

           <div class="col-sm-10"><input type="text" class="form-control" placeholder="Enter Contact Number" name="contact_no" value="@if(isset($family_mem->contact_no)){{ $family_mem['contact_no']}}@endif">
           </div>
        </div>



        <div class="form-group row ">
            <label class="col-sm-2 col-form-label">Email ID:</label>

           <div class="col-sm-10"><input type="text" class="form-control" placeholder="Enter Your Email" name="email" value="@if(isset($family_mem->email)){{ $family_mem['email']}}@endif">
           </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label">Gender:</label>
        <div class="col-sm-10">

            <select class="form-control" id="gender" name="gender" >
                <option></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>


            </div>
        </div>




    <div class="form-group row text-center mt-4">
        <div class="col-6 ">
            <button class="btn btn-primary btn-lg float-right mr-2" type="submit">
               @if(isset($family_mem['name'])) Edit
               @else Add
               @endif
            </button>
        </div>
        <div class="col-6">
            <a class="btn btn-white btn-lg float-left ml-2" href="{{ route('member.allfamilymem') }}">Cancel</a>
        </div>
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
        });
    </script>
@endpush
