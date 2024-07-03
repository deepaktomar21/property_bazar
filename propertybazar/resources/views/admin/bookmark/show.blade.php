@extends('admin.layouts.app')


@section('content')



<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">

            <div class="col-12">
            <div class="d-flex justify-content-between py-3">
        <div class="h5">View BookMark</div>
        <div>
            <a href="{{ route('admin.bookmark.list') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

    <div class="row center">
          <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
            <form action="{{ route('admin.update',$bookmark->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('post')
                                <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">User Id</label>
                            <input type="text" name="user_id" id="user_id"  class="form-control"
                           value="{{ old('user_id',$bookmark->user_id) }}" disabled>

                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Location</label>
                            <input type="text" name="location"  id="location" cols="30" rows="3" class="form-control"
                  value="{{ old('location',$bookmark->location) }}" disabled>

                          </div>
                         
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">property_Type</label>
                            <input type="text" name="property_type" id="property_type"
                 class="form-control" value="{{ old('property_type',$bookmark->property_type) }}" disabled>

                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Price</label>
                            <input type="text" name="price" id="price"
                class="form-control" value="{{ old('price',$bookmark->price) }}" disabled>

                          </div>
                         
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Area </label>
                            <input type="text" name="area" id="Website"
                class="form-control" value="{{ old('area',$bookmark->area) }}" disabled>

                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Description</label>
                            <input type="text" name="description" id="description"
                 class="form-control" value="{{ old('description',$bookmark->description) }}" disabled>

                          </div>
                                         <div class="form-row">
                          <div class="col-md-4">
                            <label for="validationCustom01">Image</label>
                            <img src="{{ asset('propertybazar/public/uploads/' . $bookmark->image) }}" class="img-fluid" alt="Image">
                            @error('image')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror

                          </div>


                          </div>

                          </div>
                          </div>


                      </form>


            </div>

        </div>
    </div>
</div>







@endsection
