@extends('admin.layouts.app')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between py-3">
                        <div class="h5">View Notification Details</div>
                        <div>
                            <a href="{{ route('notificationindex') }}" class="btn btn-primary">Back</a>
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
                                                <label for="name">User Name</label>
                                                <input type="text" name="name" id="name"
                                                    placeholder="Enter user name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $offer->user->name) }}" disabled>
                                                @error('name')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="user_type">User Type</label>
                                                <input type="text" name="user_type" id="user_type"
                                                    placeholder="Enter user type"
                                                    class="form-control @error('user_type') is-invalid @enderror"
                                                    value="{{ old('user_type', $offer->user->user_type) }}" disabled>
                                                @error('user_type')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="description">Description</label>
                                                <input type="text" name="description" id="description"
                                                    placeholder="Enter description"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    value="{{ old('description', $offer->description) }}" disabled>
                                                @error('description')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="want_to_list">Want to List</label>
                                                <input type="text" name="want_to_list" id="want_to_list"
                                                    placeholder="Enter want to list"
                                                    class="form-control @error('want_to_list') is-invalid @enderror"
                                                    value="{{ old('want_to_list', $offer->want_to_list) }}" disabled>
                                                @error('want_to_list')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="service_type">Service Type</label>
                                                <input type="text" name="service_type" id="service_type"
                                                    placeholder="Enter service type"
                                                    class="form-control @error('service_type') is-invalid @enderror"
                                                    value="{{ old('service_type', $offer->service_type) }}" disabled>
                                                @error('service_type')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="property_type">Property Type</label>
                                                <input type="text" name="property_type" id="property_type"
                                                    placeholder="Enter property type"
                                                    class="form-control @error('property_type') is-invalid @enderror"
                                                    value="{{ old('property_type', $offer->property_type) }}" disabled>
                                                @error('property_type')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="city">City</label>
                                                <input type="text" name="city" id="city" placeholder="Enter city"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    value="{{ old('city', $offer->city) }}" disabled>
                                                @error('city')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="zone">Zone</label>
                                                <input type="text" name="zone" id="zone" placeholder="Enter zone"
                                                    class="form-control @error('zone') is-invalid @enderror"
                                                    value="{{ old('zone', $offer->zone) }}" disabled>
                                                @error('zone')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="location">Location</label>
                                                <input type="text" name="location" id="location"
                                                    placeholder="Enter location"
                                                    class="form-control @error('location') is-invalid @enderror"
                                                    value="{{ old('location', $offer->location) }}" disabled>
                                                @error('location')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" id="price"
                                                    placeholder="Enter price"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    value="{{ old('price', $offer->price) }}" disabled>
                                                @error('price')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="configuration">Configuration</label>
                                                <input type="text" name="configuration" id="configuration"
                                                    placeholder="Enter configuration"
                                                    class="form-control @error('configuration') is-invalid @enderror"
                                                    value="{{ old('configuration', $offer->configuration) }}" disabled>
                                                @error('configuration')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="furnished_type">Furnished Type</label>
                                                <input type="text" name="furnished_type" id="furnished_type"
                                                    placeholder="Enter furnished type"
                                                    class="form-control @error('furnished_type') is-invalid @enderror"
                                                    value="{{ old('furnished_type', $offer->furnished_type) }}" disabled>
                                                @error('furnished_type')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="images">Images</label>
                                            <div id="carouselExampleIndicators" class="carousel slide"
                                                data-ride="carousel" data-interval="false">
                                                <div class="carousel-inner">
                                                    @if (!empty($offer->images))
                                                        @foreach (json_decode($offer->images) as $index => $image)
                                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center w-100">
                                                                    <img src="{{ asset('https://textcode.co.in/propertybazar/public/' . $image) }}"
                                                                        class="img-fluid" alt="Image">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="carousel-item active">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center w-100">
                                                                <img src="https://via.placeholder.com/400"
                                                                    class="img-fluid" alt="No images available">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @error('images')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Include Bootstrap CSS and JS -->
                                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                                        rel="stylesheet">
                                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

                                    <style>
                                        .carousel-inner {
                                            display: flex;
                                            overflow-x: auto;
                                            scroll-behavior: smooth;
                                            white-space: nowrap;
                                        }

                                        .carousel-item {
                                            display: inline-block;
                                            width: auto;
                                            margin-right: 10px;
                                        }

                                        .carousel-item img {
                                            max-height: 200px;
                                            height: auto;
                                            display: block;
                                            margin: 0 auto;
                                        }

                                        .carousel-item:hover {
                                            transform: scale(1.05);
                                            transition: transform 0.5s;
                                        }

                                        .carousel-control-prev-icon,
                                        .carousel-control-next-icon {
                                            display: none;
                                        }

                                        .carousel-indicators {
                                            display: none;
                                        }
                                    </style>




                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!-- end section -->
                </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
@endsection
