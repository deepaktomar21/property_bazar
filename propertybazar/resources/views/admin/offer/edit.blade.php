@extends('admin.layouts.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-12">
                <div class="d-flex justify-content-between py-3">
                    <div class="h5">Edit Offer</div>
                    <div>
                        <a href="{{ route('admin.offer.list') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.offer.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="building_name">Name</label>
                                            <input type="text" name="building_name" id="building_name" placeholder="Enter building name" class="form-control @error('building_name') is-invalid @enderror" value="{{ old('building_name', $offer->building_name) }}">
                                            @error('building_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" id="location" placeholder="Enter location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $offer->location) }}">
                                            @error('location')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="offers">Offers</label>
                                            <input type="text" name="offers" id="offers" placeholder="Enter offers" class="form-control @error('offers') is-invalid @enderror" value="{{ old('offers', $offer->offers) }}">
                                            @error('offers')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" placeholder="Enter price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $offer->price) }}">
                                            @error('price')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" id="description" placeholder="Enter description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $offer->description) }}">
                                            @error('description')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="images">Images</label>
                                            @if($offer->images)
                                                <div class="mb-3">
                                                    <img src="{{ asset('uploads/' . $offer->images) }}" alt="Current Image" style="max-width: 100px;">
                                                </div>
                                            @endif
                                            <input type="file" name="images" class="form-control @error('images') is-invalid @enderror">
                                            @error('images')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" name="contact_number" id="contact_number" placeholder="Enter contact number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number', $offer->contact_number) }}">
                                            @error('contact_number')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection
