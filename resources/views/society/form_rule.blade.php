
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="form-group  row"><label class="col-sm-2 col-form-label">Description</label>

    <div class="col-sm-10"><textarea cols="50" rows="5" class="form-control" placeholder="Enter Rules" name="description">@if(isset($rule_data->description)){{ $rule_data['description']}}@endif</textarea></div>
</div>

<div class="form-group row text-center">
    <div class="col-12">
        <button class="btn btn-primary btn-lg" type="submit">
           @if(isset($rule_data['description'])) Update
           @else Add
           @endif
        </button>
        <button class="btn btn-white btn-lg" type="submit">Cancel</button>
    </div>
</div>
