@push('css')
    <link href="{{ mix('/css/select2.min.css') }}" rel="stylesheet">
@endpush

<form>
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
            <label>Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
      </div>
    </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="age">Age</label>
            <input id="age" name="age" type="number" class="form-control" placeholder="Age">
            </div>
            <div class="form-group col-md-6">
            <label for="phoneno">Phone Number</label>
            <input id="phoneno" name="phoneno" type="text" class="form-control" placeholder="Phoneno">
            </div>
        </div>
        <div class="form-group">
            <label>Position</label>
            <select class="form-control" id="position" name="position">
                <option></option>
                @role('committeemember')
                    <option value="secutiry">Security</option>
                @endrole
                <option value="staff">Staff</option>
            </select>
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
@push('script')
    <!-- Select2 -->
    <script src="{!! asset('/js/select2.full.min.js') !!}"></script>
@endpush
