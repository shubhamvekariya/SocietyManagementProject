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
        <input type="text" class="form-control" placeholder="Enter Name" name="name" value="@if(isset($service->name)){{ $service['name']}}@endif">
    </div>
</div>

<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Position:</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Position" name="position" value="@if(isset($service->position)){{ $service['position']}}@endif">
    </div>
</div>

<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Mobile No:</label>

    <div class="col-sm-10">
        <input type="number" class="form-control" placeholder="Enter Mobile No" name="mobile_no" value="@if(isset($service->mobile_no)){{ $service['mobile_no']}}@endif">
    </div>
</div>


<div class="form-group row text-center mt-4">
    <div class="col-6 ">
        <button class="btn btn-primary btn-lg float-right mr-2" type="submit">
            @if(isset($service['name'])) Edit
            @else Add
            @endif
        </button>
    </div>
    <div class="col-6">
        <a class="btn btn-white btn-lg float-left ml-2" href="{{ route('society.services.index') }}">Cancel</a>
    </div>
</div>
