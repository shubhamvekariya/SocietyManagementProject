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
    <label class="col-sm-2 col-form-label">Title:</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Title Name" name="title" value="@if (isset($notice->title)) {{ $notice['title'] }} @endif">
    </div>
</div>

<div class="form-group row">

    <label class="font-normal col-sm-2 col-form-label">Description:</label>

    <div class="col-sm-10">
        <textarea rows="3" class="form-control" placeholder="Enter Description"
            name="description">@if (isset($notice->description)){{ $notice['description'] }}@endif</textarea>
    </div>
</div>



<div class="form-group row text-center">
    <div class="col-12">
        <button class="btn btn-primary btn-lg" type="submit">
            @if (isset($notice['title'])) Edit
            @else Add
            @endif
        </button>
        <a class="btn btn-white btn-lg" href="{{ route('member.notices.index') }}">Cancel</a>
    </div>
</div>


<!--End of my form-->
