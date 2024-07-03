@extends('buyer.layouts.app')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">

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
                                                    <h2>
                                                        Requirements/Inventory
                                                     Table</h2>
                                                </div>
                                                <div>

                                                    {{-- <form action="{{ route('admin.offer.list') }}" method="GET" class="form-inline">
                                            <div class="input-group">
                                                  <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request()->get('search') }}">
                                                       <div class="input-group-append">
                                                         <button class="btn btn-outline-primary" type="submit">Search</button>
                                                        </div>
                                            </div>
                                         @if (request()->has('search'))
                                         <a href="{{ route('admin.offer.list') }}" class="btn btn-link text-danger ml-2">Reset</a>
                                          @endif
                                      </form> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- row -->
                                    <div class="table-responsive">
                                        <table id="example"
                                            class="table text-fade table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable no-footer"
                                            role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr>

                                                    <th class="header-serial">S.no.</th>
                                                    <th class="header-username">User Name</th>

                                                    <th class="header-wanttolist">Want to List</th>
                                                    <th class="header-servicetype">Service Type</th>
                                                    <th class="header-propertytype">Property Type</th>
                                                    <th class="header-city">City</th>

                                                    <th class="header-action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($requirements->isNotEmpty())
                                                    @php
                                                        $counter = 1; // Initialize counter for serial number
                                                    @endphp
                                                    @foreach ($requirements as $offer)
                                                        <tr id="select_ids{{ $offer->id }}">
                                                            <td class="text-center">{{ $counter }}</td>

                                                            <td class="text-center">{{ $offer->user->name }}</td>

                                                            <td class="text-center">{{ $offer->want_to_list }}</td>
                                                            <td class="text-center">{{ $offer->service_type }}</td>
                                                            <td class="text-center">{{ $offer->property_type }}</td>
                                                            <td class="text-center">{{ $offer->city }}</td>

                                                            <td class="text-center">
                                                                <div class="d-flex justify-content-center">
                                                                    <a href="{{ route('broker.requirements.show', $offer->id) }}" class="btn btn-success btn-sm">
                                                                    <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $counter++; // Increment counter for next row
                                                        @endphp
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="8" class="text-center">No Requirements found.</td>
                                                        <!-- Adjusted colspan to match number of columns -->
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Include Bootstrap CSS and JS -->
                                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                                        rel="stylesheet">
                                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

                                    <style>
                                        .table thead th {
                                            text-align: center;
                                            color: white;
                                            /* Set text color to white for contrast */
                                        }

                                        .header-serial {
                                            background-color: #607D8B;
                                            /* Adjusted color for serial number header */
                                        }

                                        .header-username {
                                            background-color: #4CAF50;
                                            /* Green */
                                        }

                                        .header-usertype {
                                            background-color: #2196F3;
                                            /* Blue */
                                        }

                                        .header-wanttolist {
                                            background-color: #FF9800;
                                            /* Orange */
                                        }

                                        .header-servicetype {
                                            background-color: #9C27B0;
                                            /* Purple */
                                        }

                                        .header-propertytype {
                                            background-color: #E91E63;
                                            /* Pink */
                                        }

                                        .header-city {
                                            background-color: #F44336;
                                            /* Red */
                                        }

                                        .header-action {
                                            background-color: #3F51B5;
                                            /* Indigo */
                                        }

                                        .table tbody tr:nth-child(even) {
                                            background-color: #f2f2f2;
                                            /* Alternate row color */
                                        }

                                        .table tbody tr:hover {
                                            background-color: #ddd;
                                            /* Hover effect for rows */
                                        }

                                        .table tbody td {
                                            text-align: center;
                                            /* Center-align content in table cells */
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-right">
                                    <!-- Pagination links -->
                                    {{ $requirements->appends(['search' => $search])->links() }}
                                </div>
                            </div>
                        </div>
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->

        @endsection
