<div class="form-group row">

    <label class="col-lg-3 col-form-label my-auto font-weight-bold" style="font-size:1.3rem;">Description</label>

    <div class="col-lg-9"><textarea rows="3" class="form-control" placeholder="Enter Rules"
            name="description">@if (isset($rules->description)){{ $rules['description'] }}@endif</textarea>
    </div>
</div>

<div class="form-group row text-center mt-4">
    <div class="col-6 ">
        <button class="btn btn-primary btn-lg float-right mr-2" type="submit">
            @if (isset($rules['description'])) Edit
            @else Add
            @endif
        </button>
    </div>
    <div class="col-6">
        <a class="btn btn-white btn-lg float-left ml-2" href="{{ route('society.all_rule') }}">Cancel</a>
    </div>
</div>
