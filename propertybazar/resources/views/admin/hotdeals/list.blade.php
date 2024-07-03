@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <a href="#" class="btn btn-danger" id="deleteAllSelected">Delete Selected Deals</a>
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
                                                <h2>HotDeals Table</h2>
                                            </div>
                                            <div>
                                                <!-- Search form aligned to the right -->
                                                <form method="GET" action="{{ route('admin.hotdeals.list') }}" class="form-inline d-flex justify-content-between">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="search" class="sr-only">Search:</label>
                                                        <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder="Search" value="{{ old('search', $search) }}">
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary btn-sm mb-2">Search</button>
                                                        <a href="{{ route('admin.hotdeals.list') }}" class="btn btn-secondary btn-sm mb-2 ml-2">Refresh</a>
                                                    </div>
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
                                                <th><input type="checkbox" id="select_all_ids"></th>
                                                <th>User Id</th>
                                                <th>Required Description</th>
                                                <th>Budget</th>
                                                <th>Enter Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($deals->isNotEmpty())
                                                @foreach ($deals as $deal)
                                                    <tr id="select_ids{{ $deal->id }}">
                                                        <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{ $deal->id }}"></td>
                                                        <td><a href="{{ route('admin.hotdeals.show', $deal->id) }}" class="text-dark">{{ $deal->id }}</a></td>
                                                        <td>{{ $deal->description }}</td>
                                                        <td>{{ $deal->budget }}</td>
                                                        <td>{{ $deal->number }}</td>
                                                        <td>
                                                            <select class="form-control status-dropdown" data-id="{{ $deal->id }}">
                                                                <option value="claimed" {{ $deal->status == 'claimed' ? 'selected' : '' }}>Claimed</option>
                                                                <option value="not claimed" {{ $deal->status == 'not claimed' ? 'selected' : '' }}>Not Claimed</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                
                                                                <a href="#" onclick="deleteDeal({{ $deal->id }})" class="btn btn-danger btn-sm mr-1">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                <a href="{{ route('admin.hotdeals.show', $deal->id) }}" class="btn btn-success btn-sm">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">No Deals found.</td>
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
                                {{ $deals->appends(['search' => $search])->links() }}
                            </div>
                        </div>
                    </div>
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->

        <script>
            $(function() {
                $("#select_all_ids").click(function() {
                    $('.checkbox_ids').prop('checked', $(this).prop('checked'));
                });

                $('#deleteAllSelected').click(function(e) {
                    e.preventDefault();
                    var all_ids = [];
                    $('input:checkbox[name=ids]:checked').each(function() {
                        all_ids.push($(this).val());
                    });

                    if (all_ids.length > 0) {
                        if (confirm('Are you sure you want to delete selected deals?')) {
                            $.ajax({
                                url: "", // Adjust this route to your delete all route
                                type: "DELETE",
                                data: {
                                    ids: all_ids,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    $.each(all_ids, function(key, val) {
                                        $('#select_ids' + val).remove();
                                    });
                                }
                            });
                        }
                    } else {
                        alert('Please select deals to delete.');
                    }
                });

                $('.status-dropdown').change(function() {
                    var dealId = $(this).data('id');
                    var newStatus = $(this).val();

                    $.ajax({
                        url: "", // Adjust this route to your update status route
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: dealId,
                            status: newStatus
                        },
                        success: function(response) {
                            alert('Status updated successfully');
                        },
                        error: function(response) {
                            alert('Error updating status');
                        }
                    });
                });
            });

            function deleteDeal(id) {
                if (confirm('Are you sure you want to delete this deal?')) {
                    $.ajax({
                        url: "" + id, // Adjust URL to match your delete route
                        type: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#select_ids' + id).remove();
                            alert('Deal deleted successfully');
                        },
                        error: function(response) {
                            alert('Error deleting deal');
                        }
                    });
                }
            }
        </script>
    </div>
</div>
@endsection
