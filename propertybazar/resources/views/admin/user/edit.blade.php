@extends('admin.layouts.app')


@section('content')


<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">

            <div class="col-12">
            <div class="d-flex justify-content-between py-3">
        <div class="h5">Edit Company </div>
        <div>
            <a href="{{ route('admin.user.select') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card shadow mb-4">

                    <div class="card-body">
                    <form action="{{ route('admin.update',$select->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('post')
                                <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter Company Name" class="form-control
                 @error('name') is-invalid @enderror" value="{{ old('name',$select->name) }}">
                 @error('name')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">membership_id</label>
                            <input type="text" name="membership_id"  id="membership_id" cols="30" rows="3" placeholder="Enter membership_id " class="form-control
                 @error('membership_id') is-invalid @enderror" value="{{ old('membership_id',$select->membership_id) }}">

                @error('membership_id')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>
                          <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">rera_no</label>
                            <input type="text" name="rera_no" id="rera_no" placeholder="Enter rera_no"
                 class="form-control @error('rera_no') is-invalid @enderror" value="{{ old('rera_no',$select->rera_no) }}">
                 @error('rera_no')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">city</label>
                            <input type="text" name="city" id="contact" placeholder="Enter city"
                class="form-control @error('city') is-invalid @enderror" value="{{ old('city',$select->city) }}">
                 @error('city')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>
                          <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">zones </label>
                            <input type="text" name="zones" id="Website" placeholder="Enter zones"
                class="form-control @error('zones') is-invalid @enderror" value="{{ old('zones',$select->zones) }}">
                 @error('zones')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">area</label>
                            <input type="text" name="area" id="area" placeholder="Enter area"
                 class="form-control @error('area') is-invalid @enderror" value="{{ old('area',$select->area) }}">
                 @error('area')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">company</label>
                            <input type="text" name="company" id="company" placeholder="Enter company"
                 class="form-control @error('company') is-invalid @enderror" value="{{ old('company',$select->company) }}">
                 @error('company')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">working_area</label>
                            <input type="text" name="working_area" id="working_area" placeholder="Enter working_area"
                 class="form-control @error('working_area') is-invalid @enderror" value="{{ old('working_area',$select->working_area) }}">
                 @error('working_area')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">deal_in </label>
                            <input type="text" name="deal_in" id="deal_in" placeholder="Enter deal_in"
                 class="form-control @error('deal_in') is-invalid @enderror" value="{{ old('deal_in',$select->deal_in) }}">
                 @error('deal_in')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Email id</label>
                            <input type="text" name="email" id="email" placeholder="Enter Email"
                 class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$select->email) }}">
                 @error('email')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">phone</label>
                            <input type="text" name="phone" id="phone" placeholder="Enter phone"
                 class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$select->phone) }}">
                 @error('phone')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">end_date</label>
                            <input type="text" name="end_date" id="phone" placeholder="Enter end_date"
                 class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date',$select->end_date) }}">
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
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</main> <!-- main -->



@endsection
