@extends('admin.layouts.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between py-3">
                    <div class="h5">View Builder</div>
                    <div>
                        <a href="{{ route('admin.builder.list') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>

                <div class="row justify-content">
                    <div class="col-sm-8 mt-4">
                        <div class="card p-4">
                            <form>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="builder_name">Builder Name</label>
                                        <input type="text" id="builder_name" class="form-control" value="{{ $builder->builder_name }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="membership_id">Membership ID</label>
                                        <input type="text" id="membership_id" class="form-control" value="{{ $builder->membership_id }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="rera_no">RERA No</label>
                                        <input type="text" id="rera_no" class="form-control" value="{{ $builder->rera_no }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city">City</label>
                                        <input type="text" id="city" class="form-control" value="{{ $builder->city }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="zones">Zones</label>
                                        <input type="text" id="zones" class="form-control" value="{{ $builder->zones }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="area">Area</label>
                                        <input type="text" id="area" class="form-control" value="{{ $builder->area }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="company">Company</label>
                                        <input type="text" id="company" class="form-control" value="{{ $builder->company }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="working_area">Working Area</label>
                                        <input type="text" id="working_area" class="form-control" value="{{ $builder->working_area }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="deal_in">Deal In</label>
                                        <input type="text" id="deal_in" class="form-control" value="{{ $builder->deal_in }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" class="form-control" value="{{ $builder->email }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" class="form-control" value="{{ $builder->phone }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="end_date">End Date</label>
                                        <input type="text" id="end_date" class="form-control" value="{{ $builder->end_date }}" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
