@extends('layouts.app')

@section('title')
Rules
@endsection

@section('content')
<div class="ibox-content">
    <form  action="{{route('society.rule')}}" method="POST">
        @csrf
        <div class="form-group  row"><label class="col-sm-2 col-form-label">Add Rule</label>

            <div class="col-sm-10"><textarea cols="50" rows="5" class="form-control" placeholder="Enter Rules" name="description"></textarea></div>
        </div>

        <div class="form-group row text-center">
            <div class="col-12">
                <button class="btn btn-primary btn-lg" type="submit">Add</button>
                <button class="btn btn-white btn-lg" type="submit">Cancel</button>
            </div>
        </div>

        
    </form>
</div>
@endsection
