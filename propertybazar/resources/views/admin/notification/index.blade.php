@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    {{-- <a href="{{route('admin.deleteAll')}}" class="btn btn-danger" id="deleteAllSelected">Delete Selected Users</a> --}}

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="heading1 margin_0">
                                                <h2>Notifications Table</h2>
                                            </div>
                                            <div>
                                                <!-- Search form aligned to the right -->
                                                <form action="{{ route('notificationindex') }}" method="GET" class="form-inline">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request()->get('search') }}">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                                                        </div>
                                                    </div>
                                                    @if (request()->has('search'))
                                                    <a href="{{ route('notificationindex') }}" class="btn btn-link">Reset</a>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- row -->
                                <div class="table-responsive">
                                    <table id="example" class="table text-fade table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable no-footer" role="grid" aria-describedby="example_info">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>User Name</th>
                                                <th>User Type</th>
                                                <th>Description</th>
                                                <th>Images</th>
                                                <th>Want to List</th>
                                                <th>Service Type</th>
                                                <th>Property Type</th>
                                                <th>City</th>
                                                <th>Zone</th>
                                                <th>Location</th>
                                                <th>Price</th>
                                                <th>Configuration</th>
                                                <th>Furnished Type</th>
                                                <th>Sqft</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($notifications->isNotEmpty())
                                            @foreach ($notifications as $offer)
                                            <tr id="select_ids{{ $offer->id }}">
                                                <td><input type="checkbox" name="ids" class="checkbox_ids" id="checkbox_ids" value="{{ $offer->id }}"></td>

                                                <td>{{ $offer->user->name }}</td>
                                                <td>{{ $offer->user->user_type }}</td>
                                                <td>{{ $offer->description }}</td>
                                                <td>
                                                    <b>
                                                        @if (!empty($offer->images))
                                                        @foreach(json_decode($offer->images) as $image)

                                                        <img src="{{ asset('https://textcode.co.in/propertybazar/public/' . $image) }}" class="rounded" width="30" />
                                                        @endforeach
                                                        @else
                                                        <span>No images available</span>
                                                        @endif

                                                    </b>
                                                </td>
                                                <td>{{ $offer->want_to_list }}</td>
                                                <td>{{ $offer->service_type }}</td>
                                                <td>{{ $offer->property_type }}</td>
                                                <td>{{ $offer->city }}</td>
                                                <td>{{ $offer->zone }}</td>
                                                <td>{{ $offer->location }}</td>
                                                <td>{{ $offer->price }}</td>
                                                <td>{{ $offer->configuration }}</td>
                                                <td>{{ $offer->furnished_type }}</td>
                                                <td>{{ $offer->sqft }}</td>
                                                <td>{{ $offer->contact_number }}</td>
                                                <td>
                                                    <div class="d-flex">

                                                        <a href="" class="btn btn-success btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="16" class="text-center">No notification found.</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-right">
                                <!-- Pagination links -->
                                {{ $notifications->appends(request()->except('page'))->links() }}
                            </div>
                        </div>
                    </div>
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->








        @endsection
