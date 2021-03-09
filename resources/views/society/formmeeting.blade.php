
@push('css')
<link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
<link href="{{ asset('css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet">
@endpush

<div class="ibox-content">
        <div class="form-group row ">
            <label class="col-sm-2 col-form-label">Meeting's Title:</label>

           <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="@if(isset($meeting->title)){{ $meeting['title']}}@endif">
        </div>
        </div>

         <div class="form-group row" id="data_1">
        <label class="font-normal col-sm-2 col-form-label">Date:</label>
        <div class="input-group date col-sm-10 ">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" id="DATE" value="@if(isset($meeting->date)){{ $meeting['date']}}@endif" onClick="return current_Date();" placeholder="Date of Meeting" autocomplete="off">
        </div>
    </div>



    <div class="form-group row">
    <label class="font-normal col-sm-2 col-form-label">Start Time:</label>
    <div class="input-group clockpicker col-10" data-autoclose="true">
        <input type="text" class="form-control" value="@if(isset($meeting->start_time)){{ $meeting['start_time']}}@endif" name="start_time" >
        <span class="input-group-addon">
            <span class="fa fa-clock-o"></span>
        </span>
    </div>
    </div>

    <div class="form-group row">
    <label class="font-normal col-sm-2 col-form-label">End Time:</label>
    <div class="input-group clockpicker col-10" data-autoclose="true">

        <input type="text" class="form-control" value="@if(isset($meeting->end_time)){{ $meeting['end_time']}}@endif" name="end_time">
        <span class="input-group-addon">
            <span class="fa fa-clock-o"></span>
        </span>
    </div>
    </div>



<!--<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Select Place</label>

            <div class="col-sm-10">
                <select class="form-control m-b" name="place">
                <option>Hall</option>
                <option>Club House</option>
                <option>Garden</option>

            </select>
        </div>
    </div>-->

    <div class="form-group row ">
        <label class="col-sm-2 col-form-label">Select Place:</label>
        <div class="col-sm-10">

        <select class="form-control m-b" id="place" name="place" >
            <option></option>
            <option value="Hall">Hall</option>
            <option value="Club House">Club House</option>
            <option value="Garden">Garden</option>
        </select>


        </div>
    </div>


    <div class="form-group row text-center">
            <div class="col-12">
                <button class="btn btn-primary btn-lg" type="submit">
                    @if(isset($meeting['title'])) Edit
                    @else Add
                    @endif
                </button>
                <a class="btn btn-white btn-lg" href="{{ route('society.meetings.index') }}">Cancel</a>
            </div>
        </div>


@push('script')

        <!--scripts-->
         <!-- iCheck -->
        <script src="{{ asset('js/icheck.min.js') }}"></script>

        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

        <script src="{{ asset('js/clockpicker.js') }}"></script>

        <script>
             $(document).ready(function(){

            var mem = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            var yearsAgo = new Date();
            yearsAgo.setFullYear(yearsAgo.getFullYear() - 20);

            $('#selector').datepicker('setDate', yearsAgo );

            $('.clockpicker').clockpicker();
        });
        </script>

        <script type="text/javascript">

            var today = new Date();

            var dd = today.getDate();
            var mm = today.getMonth() + 1;

            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var today = mm + '/' + dd + '/' + yyyy;
                function current_Date()
                {
                    document.getElementById('DATE').value = today;
                }

            </script>

            <!-- Select2 -->
        <script src="{!! asset('/js/select2.full.min.js') !!}"></script>
        <script>
            $(document).ready(function(){
                $("#place").select2({
                    placeholder: "Select a Place",
                    allowClear: true
                });
            });
        </script>
@endpush
