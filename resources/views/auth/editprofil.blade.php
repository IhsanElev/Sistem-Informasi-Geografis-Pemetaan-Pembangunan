@extends('layouts.app')
@section('content')
<div class="col-12 col-md-12 col-lg-7">
    <div class="card">
        <form method="post" action="{{ route('profile.update')}}">
            @method('patch')
            @csrf
            <div class=" card-header">
                <h4>Edit Profile</h4>
            </div>
            <div class="card-body">

                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" required="">
                    <div class="invalid-feedback">
                        Please fill in the first name
                    </div>
                </div>



                <div class="form-group col-md-12">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                        Please fill in the email
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required="">
                    <div class="invalid-feedback">
                        Please fill in the email
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection