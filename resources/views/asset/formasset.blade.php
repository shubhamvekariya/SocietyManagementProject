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
   <!--form starte-->

                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Name:</label>

                           <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Enter Assets/Event Name" name="name" value="@if(isset($asset->name)){{ $asset['name']}}@endif">
                        </div>
                        </div>

                        <div class="form-group row">
                            <label class="font-normal col-sm-2 col-form-label">Start Date & Time:</label>
                            <div class="input-group date col-sm-10 ">
                                <span class="input-group-addon" ><i class="fa fa-calendar"></i></span><input type="text" name="start_time" class="form-control" id="datetimepicker1"  onClick="return current_Date();" placeholder="Start Date & Time of Meeting" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="font-normal col-sm-2 col-form-label">End Date & Time:</label>
                            <div class="input-group date col-sm-10 ">
                                <span class="input-group-addon" ><i class="fa fa-calendar"></i></span><input type="text" name="end_time" class="form-control" id="datetimepicker2"  onClick="return current_Date();" placeholder="End Date & Time of Meeting" autocomplete="off">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Select Event/Asset:</label>
                            <div class="col-sm-10">

                            <select class="form-control m-b" id="asset" name="assets" >
                                <option></option>
                                <option value="Event">Event</option>
                                <option value="Asset">Asset</option>
                            </select>
                        </div>
                    </div>
                            <div class="form-group row">

                                <label class="font-normal col-sm-2 col-form-label">Function Details(optional):</label>

                                <div class="col-sm-10">
                                    <textarea  rows="3" class="form-control" placeholder="Enter Function Description" name="func_details">@if(isset($asset->func_details)){{ $asset['func_details']}}@endif</textarea>
                                </div>
                            </div>


                     <div class="form-group row ">
                         <label class="col-sm-2 col-form-label">Charges:</label>

                        <div class="col-sm-10">
                         <input type="number" class="form-control" placeholder="Enter Charges" name="charges" value="@if(isset($asset->charges)){{ $asset['charges']}}@endif">
                     </div>
                     </div>

                     <div class="form-group row text-center">
                        <div class="col-12">
                            <button class="btn btn-primary btn-lg" type="submit">
                                @if(isset($asset['name'])) Edit
                                @else Add
                                @endif
                            </button>
                            <a class="btn btn-white btn-lg" href="{{ route('member.assets.index') }}">Cancel</a>
                        </div>
                    </div>


                <!--End of my form-->

@push('script')

                <!--scripts-->
                 <!-- iCheck -->
                <script src="{{ asset('js/icheck.min.js') }}"></script>
                <script src="{{ asset('js/moment.min.js') }}"></script>
                <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
                    <!-- Select2 -->
                <script src="{!! asset('/js/select2.full.min.js') !!}"></script>
                <script>
                    $(document).ready(function(){
                        $("#asset").select2({
                            placeholder: "--Select-- ",
                            allowClear: true
                        });
                    });
                </script>
@endpush