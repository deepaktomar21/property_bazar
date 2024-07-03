@extends('buyer.layouts.app')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between py-3">
                    <div class="h5">View Broker's Details</div>
                    <div>
                        <a href="{{ route('buyer.management') }}" class="btn btn-primary">Back</a>
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
                                            <input type="text" name="name" id="name" placeholder="Enter  name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" disabled>
                                            @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" name="mobile" id="mobile" placeholder="Enter mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile', $user->mobile) }}" disabled>
                                            @error('mobile')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" disabled>
                                            @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-6 mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" placeholder="Enter price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $user->price) }}" disabled>
                                            @error('price')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div> --}}
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
