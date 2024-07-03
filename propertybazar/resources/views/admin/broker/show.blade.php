@extends('admin.layouts.app')


@section('content')

<main role="main" class="main-content">
        <div class="container-fluid ">
          <div class="row justify-content-center">

            <div class="col-12">
            <div class="d-flex justify-content-between py-3">
        <div class="h5">View Brokers </div>
        <div>
            <a href="{{ route('admin.broker.list') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card shadow mb-4">

                    <div class="card-body  ">
                    <form action="{{ route('admin.broker.update', $broker->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('post')
                          <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="exampleInputEmail1">broker_name</label>
                            <input type="text" name="broker_name" id="broker_name" placeholder="Enter broker_name"
                 class="form-control @error('broker_name') is-invalid @enderror" value="{{ old('broker_name', $broker->broker_name) }}" disabled>
                 @error('broker_name')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>
                          <div class="col-md-12 mb-3">
                            <label for="validationCustom01">membership_id </label>
                            <input type="text" name="membership_id" id="membership_id" placeholder="Enter membership_id"
                 class="form-control @error('membership_id') is-invalid @enderror" value="{{ old('membership_id', $broker->membership_id) }}" disabled>
                 @error('membership_id')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>

                                <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="exampleInputEmail1"> location</label>
                            <input type="text" name="location" id="location" placeholder="Enter location" class="form-control
                 @error('location') is-invalid @enderror" value="{{ old('location', $broker->location) }}" disabled>
                 @error('location')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror
                          </div>

                          <div class="col-md-12 mb-3">
                            <label for="validationCustom01">contact_number </label>
                            <input type="number" name="contact_number" id="contact_number" placeholder="Enter contact_number"
                 class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number', $broker->contact_number) }}" disabled>
                 @error('contact_number')
                 <p class="invalid-feedback">{{ $message }}</p>

                 @enderror

                          </div>




                          <div class="col-md-12 mb-3">
                            <label for="validationCustom01">deals_description </label>
                            <input type="description" name="deals_description" id="deals_description" placeholder="Enter contact_number"
                 class="form-control @error('deals_description') is-invalid @enderror" value="{{ old('deals_description', $broker->deals_description) }}" disabled>
                 @error('deals_description')
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


















