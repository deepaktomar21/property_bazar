@extends('admin.layouts.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between py-3">
                    <div class="h5">Add Loan</div>
                    <div>
                        <a href="{{ route('admin.home_loan.list') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.home_loan.update', $homeloan->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="required_description">Loan Description	</label>
                                            <input type="description" name="loan_description	" id="loan_description	" placeholder="Enter loan_description	"
                                            class="form-control @error('loan_description	') is-invalid @enderror"
                                            value="{{ old('loan_description	', $homeloan->loan_description	) }}" disabled>
                                            @error('user_name')
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
</main> <!-- main -->

@endsection
