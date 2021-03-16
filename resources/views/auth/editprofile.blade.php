@extends('layouts.app')

@push('css')
    <link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
@endpush

@section('title')
    Edit Profile
@endsection

@section('breadcrumb-title')
    Edit Profile
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Profile</strong>
    </li>
@endsection

@section('content')
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form name="myForm" action="{{ route('member.update') }}" method="POST">
            @csrf
            <!--Profile Information-->
            <div class="form-group row ">
                <label class="col-sm-2 col-form-label">Name:</label>

                <div class="col-sm-10"><input type="text" class="form-control" placeholder="Enter Name" name="name"
                        value="{{$user['name']}}">
                </div>
            </div>

            <div class="form-group row ">
                <label class="col-sm-2 col-form-label">Phone Number:</label>

                <div class="col-sm-10"><input type="number" class="form-control" placeholder="Enter Phone Number"
                        name="phoneno" value="{{$user['phoneno']}}">
                </div>
            </div>



            <div class="form-group row ">
                <label class="col-sm-2 col-form-label">Age:</label>

                <div class="col-sm-10"><input type="number" class="form-control" placeholder="Enter Your Age" name="age"
                        value="{{$user['age']}}">
                </div>
            </div>

            <div class="form-group row ">
                <label class="col-sm-2 col-form-label">Gender:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="gender" name="gender">
                        <option></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <label class="col-12 col-form-label text-center">Apartment Details:</label>
            <!--Apartment details-->
            <div class="form-group row ">
                <label class="col-sm-2 col-form-label">Name/Number:</label>

                <div class="col-sm-10"><input type="number" class="form-control" placeholder="Enter Your Name/Number"
                        name="name_or_number" value="{{ $user->apartment->name_or_number}}">
                </div>
            </div>

            <div class="form-group row ">
                <label class="col-sm-2 col-form-label">Floor Number:</label>

                <div class="col-sm-10"><input type="number" class="form-control" placeholder="Enter Your Floor Number"
                        name="floor_no" value="{{ $user->apartment->floor_no}}">
                </div>
            </div>


            <div class="form-group row ">
                <label class="col-sm-2 col-form-label">BHK:</label>

                <div class="col-sm-10"><input type="number" class="form-control" placeholder="Enter Your BHK" name="BHK"
                        value="{{ $user->apartment->BHK}}">
                </div>
            </div>

            <div class="form-group row ">
                <label class="col-sm-2 col-form-label">Price:</label>

                <div class="col-sm-10"><input type="number" class="form-control" placeholder="Enter Your Price" name="price"
                        value="{{ $user->apartment->price}}">
                </div>
            </div>


            <div class="form-group row text-center mt-4">
                <div class="col-6 ">
                    <button class="btn btn-primary btn-lg float-right mr-2" type="submit">
                        Edit
                    </button>
                </div>
                <div class="col-6">
                    <a class="btn btn-white btn-lg float-left ml-2" href="#">Cancel</a>
                </div>
            </div>

        </form>

    </div>
    @endsection

    @push('script')
        <!-- Select2 -->
        <script>
        gender = {!! str_replace("'", "\'", json_encode($user->gender)) !!};
        $('#gender').val(gender);
        </script>
    @endpush


