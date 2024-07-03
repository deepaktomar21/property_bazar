@extends('admin.layouts.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between py-3">
                    <div class="h5">Edit Deals</div>
                    <div>
                        <a href="{{ route('admin.hotdeals.list') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.hotdeals.update', $deal->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="required_description">Required Description</label>
                                          <textarea name="required_description" id="required_description"
                                          placeholder="Enter required_description"
                                          class="form-control @error('required_description') is-invalid @enderror">{{ old('required_description', $deal->required_description) }}</textarea>

                                            @error('required_description')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="budget">Budget</label>
                                            <input type="text" name="budget" id="budget" placeholder="Enter budget" class="form-control @error('budget') is-invalid @enderror" value="{{ old('budget', $deal->budget) }}" >
                                            @error('budget')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="enter_number">Enter Number</label>
                                            <input type="text" name="enter_number" id="enter_number" placeholder="Enter enter number" class="form-control @error('enter_number') is-invalid @enderror" value="{{ old('enter_number', $deal->enter_number) }}">
                                            @error('enter_number')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="claimed">Claimed</label>
                                            <input name="claimed" id="claimed" class="form-control" value="{{ old('claimed', $deal->claimed) }}">

                                            @error('claimed')
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
