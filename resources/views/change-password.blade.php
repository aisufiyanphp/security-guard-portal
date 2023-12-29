@extends("layout.layout")
@section("title-tag", "Change Password")
@section("header-title", "Change Password")
@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card my-5">
            <div class="card-body">
                <form action="{{ route('changePasswordProcess') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="pswd">Current Password:</label>
                        <input type="text" class="form-control form-control-sm" name="current_password">
                    </div>
                    <div class="form-group">
                        <label for="pswd">New Password:</label>
                        <input type="text" class="form-control form-control-sm" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="pswd">Confirm Password:</label>
                        <input type="text" class="form-control form-control-sm" name="confirmpassword">
                    </div>
                    <input type="submit" class="btn btn-primary w-100 font-weight-bold" value="Change Password">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>


@endsection


