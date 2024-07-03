@extends('admin.layouts.app')


@section('content')



<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">

            <div class="col-12">
            <div class="d-flex justify-content-between py-3">
        <div class="h5">View Agent</div>
        <div>
            <a href="{{ route('admin.agent.list') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

    <div class="row justify-content">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
            <form action="{{ route('admin.update',$agent->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('post')
                                <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Agent Name</label>
                            <input type="text" name="agent_name" id="agent_name"  class="form-control"
                           value="{{ old('agent_name',$agent->agent_name) }}" disabled>

                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">membership_id</label>
                            <input type="text" name="membership_id"  id="membership_id" cols="30" rows="3" class="form-control"
                  value="{{ old('membership_id',$agent->membership_id) }}" disabled>

                          </div>
                          <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">rera_no</label>
                            <input type="text" name="rera_no" id="rera_no"
                 class="form-control" value="{{ old('rera_no',$agent->rera_no) }}" disabled>

                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">city</label>
                            <input type="text" name="city" id="contact" placeholder="Enter city"
                class="form-control" value="{{ old('city',$agent->city) }}" disabled>

                          </div>
                          <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">zones </label>
                            <input type="text" name="zones" id="Website"
                class="form-control" value="{{ old('zones',$agent->zones) }}" disabled>

                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">area</label>
                            <input type="text" name="area" id="area"
                 class="form-control" value="{{ old('area',$agent->area) }}" disabled>

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">company</label>
                            <input type="text" name="company" id="company"
                 class="form-control " value="{{ old('company',$agent->company) }}" disabled>


                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">working_area</label>
                            <input type="text" name="working_area" id="working_area"
                 class="form-control" value="{{ old('working_area',$agent->working_area) }}" disabled>

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">deal_in </label>
                            <input type="text" name="deal_in" id="deal_in"
                 class="form-control" value="{{ old('deal_in',$agent->deal_in) }}" disabled>

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Email id</label>
                            <input type="text" name="email" id="email"
                 class="form-control" value="{{ old('email',$agent->email) }}" disabled>


                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">phone</label>
                            <input type="text" name="phone" id="phone"
                 class="form-control" value="{{ old('phone',$agent->phone) }}" disabled>


                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom01">end_date</label>
                            <input type="text" name="end_date" id="phone"
                 class="form-control " value="{{ old('end_date',$agent->end_date) }}" disabled>


                          </div>

                      </form>


            </div>

        </div>
    </div>
</div>







@endsection
