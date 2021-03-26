@push('css')
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
    <label class="col-sm-2 col-form-label">Expense's Title:</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Title" name="title" value="@if(isset($expense->title)){{ $expense['title']}}@endif">
    </div>
</div>

<div class="form-group row">

    <label class="col-sm-2 col-form-label">Description:</label>

    <div class="col-lg-10"><textarea rows="3" class="form-control" placeholder="Enter Description"
            name="description">@if(isset($expense->description)){{ $expense['description']}}@endif</textarea></div>
</div>

<div class="form-group row">
    <label class="font-normal col-sm-2 col-form-label">Date & Time:</label>
    <div class="input-group date col-sm-10 ">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date"
            class="form-control" id="datetimepicker1" placeholder="Enter Date" onClick="return current_Date();"
            autocomplete="off">
    </div>
</div>

<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Money:</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" placeholder="Enter Money" name="money" value="@if(isset($expense->money)){{ $expense['money']}}@endif">
    </div>
</div>

<div class="form-group row text-center">
    <div class="col-12">
        <button class="btn btn-primary btn-lg" type="submit">
            @if(isset($expense['title'])) Edit
            @else Add
            @endif
        </button>
        <a class="btn btn-white btn-lg" href="{{ route('member.expenses.index') }}">Cancel</a>
    </div>
</div>


@push('script')

    <!--scripts-->
    <!-- iCheck -->
    <script src="{{ asset('js/icheck.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush
