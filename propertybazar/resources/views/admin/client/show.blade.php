@extends('admin.layouts.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between py-3">
                    <div class="h5">Add Loan</div>
                    <div>
                        <a href="{{ route('admin.broker.update', $broker->id) }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form action="{{ {{ route('admin.client.update', $client->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="loan_description">Client Name</label>
                                            <input type="text" name="client_name" id="client_name"
                                            placeholder="Enter client_name"
                                            class="form-control @error('client_name') is-invalid @enderror"
                                            value="{{ old('client_name', $client->client_name) }}" disabled>
                                            @error('client_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="number">Contact Number</label>
                                            <input type="text" name="contact_number" id="contact_number" placeholder="Enter contact_number"
                                            class="form-control @error('contact_number') is-invalid @enderror"
                                            value="{{ old('contact_number', $client->contact_number) }}" disabled>
                                            @error('contact_number')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="text">Address</label>
                                            <input type="text" name="address" id="address" placeholder="Enter address"
                                            class="form-control @error('address') is-invalid @enderror"
                                             value="{{ old('address', $client->address) }}" disabled>
                                            @error('address')
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
</main> <!-- main -->

@endsection
