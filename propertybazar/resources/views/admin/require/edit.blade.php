@extends('admin.layouts.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between py-3">
                    <div class="h5">Edit Requirements</div>
                    <div>
                        <a href="{{ route('admin.require.list') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.require.update', $requirement->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <!-- Include this hidden input to specify the POST method -->
                                    <input type="hidden" name="_method" value="POST">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" id="location" placeholder="Enter location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $requirement->location) }}">
                                            @error('location')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="property_type">Property Type</label>
                                            <input type="text" name="property_type" id="property_type" placeholder="Enter property type" class="form-control @error('property_type') is-invalid @enderror" value="{{ old('property_type', $requirement->property_type) }}">
                                            @error('property_type')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" placeholder="Enter price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $requirement->price) }}">
                                            @error('price')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="area_sqrtFit">Area (sqft)</label>
                                            <input type="text" name="area_sqrtFit" id="area_sqrtFit" placeholder="Enter area in sqft" class="form-control @error('area_sqrtFit') is-invalid @enderror" value="{{ old('area_sqrtFit', $requirement->area_sqrtFit) }}">
                                            @error('area_sqrtFit')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="user_name">User Name</label>
                                            <input type="text" name="user_name" id="user_name" placeholder="Enter user name" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name', $requirement->user_name) }}">
                                            @error('user_name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="membership_id">Membership ID</label>
                                            <input type="text" name="membership_id" id="membership_id" placeholder="Enter membership ID" class="form-control @error('membership_id') is-invalid @enderror" value="{{ old('membership_id', $requirement->membership_id) }}">
                                            @error('membership_id')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" name="contact_number" id="contact_number" placeholder="Enter contact number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number', $requirement->contact_number) }}">
                                            @error('contact_number')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
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
                                    <small><strong>Package has uploaded successfully</strong></small>
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
                                    <small><strong>Widgets are updated successfully</strong></small>
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
                            </div>
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
            </div>
        </div>
    </div>
</main> <!-- main -->

@endsection
