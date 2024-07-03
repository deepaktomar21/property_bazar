@extends('buyer.layouts.app')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between py-3">
                    <div class="h5">View Offer's Details</div>
                    <div>
                        <a href="{{ route('broker.offers') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row center">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" placeholder="Enter  name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $offer->user->name) }}" disabled>
                                            @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" id="location" placeholder="Enter location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $offer->location) }}" disabled>
                                            @error('location')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="offers">Offers</label>
                                            <input type="text" name="offers" id="offers" placeholder="Enter offers" class="form-control @error('offers') is-invalid @enderror" value="{{ old('offers', $offer->offers) }}" disabled>
                                            @error('offers')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" placeholder="Enter price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $offer->price) }}" disabled>
                                            @error('price')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" id="description" placeholder="Enter description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $offer->description) }}" disabled>
                                            @error('description')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" name="contact_number" id="contact_number" placeholder="Enter contact number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number', $offer->contact_number) }}" disabled>
                                            @error('contact_number')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label for="image">Image</label>
                                            <div>
                                                <img src="{{ asset('https://textcode.co.in/propertybazar/public/uploads/' . $offer->images) }}" class="img-fluid" alt="Image" />
                                            </div>
                                            @error('image')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
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
