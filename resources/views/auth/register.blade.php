@extends('auth.default')

@section('title')
    Registration
@endsection

@section('css')
    <link href="{{ mix('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/jquery.steps.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="middle-box text-center loginscreen  animated fadeInDown" style="max-width:700px;width:700px;padding-top:0">
    <div>
        <div>

            <h4 class="logo-name" style="font-size: 100px;margin-top:0;">AP+</h4>

        </div>
        <div class="ibox-content">
                        <h2>
                            Register to AP+
                        </h2>
                        <p>
                          Create account to see it in action.
                        </p>
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <strong>Error!</strong>
                            <ul class="text-left">
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (Request::segment(2) == 'society')
                            <form id="form" action="{{route('register.society')}}" method="POST" class="wizard-big">
                                @csrf
                                <h1>Society</h1>
                                <fieldset style="height:500px">
                                    <h2>Society <b>/</b> Apartment Information</h2>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Society <b>/</b> Apartment Name*</label>
                                                <input id="society_name" name="society_name" type="text" class="form-control required" value={{ old('society_name') }}>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control"></textarea>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 150px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Country*</label>
                                            <select class="form-control" id="country" name="country"  required>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>State</label>
                                            <select class="form-control" id="state" name="state">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                        <label>City</label>
                                        <select class="form-control" id="city" name="city">
                                            <option></option>
                                        </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <h1>Secretary</h1>
                                <fieldset>
                                    <h2>Profile Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First name*</label>
                                                <input id="fname" name="fname" type="text" class="form-control required" value={{ old('fname') }}>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Last name*</label>
                                                <input id="lname" name="lname" type="text" class="form-control required" value={{ old('lname') }}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input id="email" name="email" type="email" class="form-control required email" value={{ old('email') }}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Phone Number*</label>
                                                <input id="pnumber" name="phoneno" type="number" min="0" class="form-control required" value={{ old('phoneno') }}>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Password</h1>
                                <fieldset>
                                    <h2>Set Password</h2>
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="form-group">
                                                <label>Password*</label>
                                                <input id="password" name="password" type="password" class="form-control required" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="form-group">
                                                <label>Confirm Password*</label>
                                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control required" >
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Finish</h1>
                                <fieldset>
                                    <h2>Terms and Conditions</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        @endif

                        @if (Request::segment(2) == 'member')
                            <form id="form" action="{{route('register.member')}}" method="POST" class="wizard-big">
                                @csrf
                                <h1>Secretary</h1>
                                <fieldset>
                                    <h2>Profile Information</h2>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input id="name" name="name" type="text" class="form-control required" value={{ old('name') }}>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input id="email" name="email" type="email" class="form-control required email" value={{ old('email') }}>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Password</h1>
                                <fieldset>
                                    <h2>Set Password</h2>
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="form-group">
                                                <label>Password*</label>
                                                <input id="password" name="password" type="password" class="form-control required" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="form-group">
                                                <label>Confirm Password*</label>
                                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control required" >
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Finish</h1>
                                <fieldset>
                                    <h2>Terms and Conditions</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        @endif

                    </div>
            <p class="text-muted text-center mt-2 mb-0"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white w-50 mx-auto btn-block" href="{{ route('login.society') }}">Login</a>
        <p class="m-t"> <small>Work with appartment manangement &copy; 2021</small> </p>
    </div>
</div>
@endsection
@section('script')
    <!-- iCheck -->
    <script src="{!! asset('/js/icheck.min.js') !!}"></script>
	 <!-- Steps -->
    <script src="{!! asset('/js/jquery.steps.min.js') !!}"></script>
    <!-- Jquery Validate -->
    <script src="{!! asset('/js/jquery.validate.min.js') !!}"></script>
    <!-- Select2 -->
    <script src="{!! asset('/js/select2.full.min.js') !!}"></script>

    <script src="{!! asset('/js/register.js') !!}"></script>

@endsection
