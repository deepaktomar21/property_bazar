@extends('admin.layouts.app')


@section('content')

<main role="main" class="main-content">
        <div class="container-fluid ">
          <div class="row justify-content-center">

            <div class="col-12">
            <div class="d-flex justify-content-between py-3">
        <div class="h5">Add User </div>
        <div>
            <a href="{{ route('admin.user.select') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card shadow mb-4">

                    <div class="card-body  ">
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                          @csrf
                                <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1"> Name</label>
                            <input type="name" name="name" id="name" placeholder="Enter Name" class="form-control
                 @error('name') is-invalid @enderror" value="{{ old('name') }}">
                 @error('name')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Membership_Id</label>
                            <input type="membership_id" name="membership_id" id="membership_id" placeholder="Enter Membership_Id"
                 class="form-control @error('membership_id') is-invalid @enderror" value="{{ old('membership_id') }}">
                 @error('membership_id')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>
                          <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Rera_No</label>
                            <input type="rera_no" name="rera_no" id="rera_no" placeholder="Enter Rera_No"
                 class="form-control @error('rera_no') is-invalid @enderror" value="{{ old('rera_no') }}">
                 @error('rera_no')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">City</label>
                            <input type="city" name="city" id="contact" placeholder="Enter City"
                class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
                 @error('city')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>
                          <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Zones </label>
                            <input type="zones" name="zones" id="zones" placeholder="Enter Zones"
                class="form-control @error('zones') is-invalid @enderror" value="{{ old('zones') }}">
                 @error('zones')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Area </label>
                            <input type="area" name="area" id="area" placeholder="Enter Area"
                 class="form-control @error('area') is-invalid @enderror" value="{{ old('area') }}">
                 @error('area')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Company </label>
                            <input type="company" name="company" id="company" placeholder="Enter Company"
                 class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}">
                 @error('company')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Working_Area </label>
                            <input type="working_area" name="working_area" id="working_area" placeholder="Enter Working_Area"
                 class="form-control @error('working_area') is-invalid @enderror" value="{{ old('working_area') }}">
                 @error('working_area')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Deal_In </label>
                            <input type="deal_in" name="deal_in" id="deal_in" placeholder="Enter Deal_In"
                 class="form-control @error('deal_in') is-invalid @enderror" value="{{ old('deal_in') }}">
                 @error('deal_in')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Email </label>
                            <input type="email" name="email" id="email" placeholder="Enter Email"
                 class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                 @error('email')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Phone </label>
                            <input type="phone" name="phone" id="phone" placeholder="Enter Phone"
                 class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                 @error('phone')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">End_Date </label>
                            <input type="end_date" name="end_date" id="end_date" placeholder="Enter End_Date"
                 class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                 @error('end_date')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                        <div>
                        <button class="btn btn-primary" type="submit">Submit form</button>

                        </div>
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /.col -->

              </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              
</main> <!-- main -->







@endsection
