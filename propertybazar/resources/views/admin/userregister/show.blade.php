@extends('admin.layouts.app')


@section('content')



<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">

            <div class="col-12">
            <div class="d-flex justify-content-between py-3">
        <div class="h5">View User</div>
        <div>
            <a href="{{ route('admin.userregister.list') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

    <div class="row center">
        <div class="col-sm-6">
            <div class="card p-4">
            <form action="{{ route('admin.update',$user->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('post')
                                <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" id="name"  class="form-control"
                           value="{{ old('name',$user->name) }}" disabled>

                          </div>

                          <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Mobile Number</label>
                            <input type="text" name="mobile"  id="mobile" cols="30" rows="3" class="form-control"
                  value="{{ old('mobile',$user->mobile) }}" disabled>

                          </div>
                          <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" id="email"
                 class="form-control" value="{{ old('email',$user->email) }}" disabled>

                          </div>

                          <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password"
                class="form-control" value="{{ old('password',$user->password) }}" disabled>

                          </div>

                          <div class="col-md-12 mb-3">
                            <label for="exampleInputEmail1">Confirm Password </label>
                            <input type="password" name="confirm_password" id="Website"
                class="form-control" value="{{ old('confirm_password',$user->confirm_password) }}" disabled>

                          </div>

                          <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Membership_id</label>
                            <input type="text" name="membership_id" id="membership_id"
                 class="form-control" value="{{ old('membership_id',$user->membership_id) }}" disabled>

                          </div>

                      </form>


            </div>

        </div>
    </div>
</div>







@endsection
