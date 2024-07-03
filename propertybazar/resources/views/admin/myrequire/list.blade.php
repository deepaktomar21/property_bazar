@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">

                    <a href="#" class="btn btn-danger" id="deleteAllSelected">Delete Selected MyRequire</a>
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
                                                <h2>My Requirements Table</h2>
                                            </div>
                                            <div>
                                                <!-- Search form aligned to the right -->
                                                <form method="GET" action="{{ route('admin.myrequire.list') }}" class="form-inline d-flex justify-content-between">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="search" class="sr-only">Search:</label>
                                                        <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder="Search" value="{{ $search }}">
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary btn-sm mb-2">Search</button>
                                                        <a href="{{ route('admin.myrequire.list') }}" class="btn btn-secondary btn-sm mb-2 ml-2">Refresh</a>
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
                                                <th>My Require Id</th>

                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($myrequire as $myrequire)
                                            <tr id="select_ids{{ $myrequire->id }}">
                                                <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{ $myrequire->id }}"></td>
                                                <td><a href="{{ route('admin.myrequire.show', $myrequire->id) }}" class="text-dark">{{ $myrequire->id }}</a></td>

                                                <td>{{ $myrequire->require_description }}</td>
                                                <td>
                                                    <div class="d-flex">

                                                        <a href="{{ route('admin.myrequire.delete', $myrequire->id) }}" onclick="deletemyrequire({{ $myrequire->id }})" class="btn btn-danger btn-sm mr-1">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="{{ route('admin.myrequire.show', $myrequire->id) }}" class="btn btn-success btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No require found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div>
</div>

<script>
    $(function(e) {
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
                if (confirm('Are you sure you want to delete selected news articles?')) {
                    $.ajax({
                        url: "", // Correct route URL for deleting all selected news
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
                alert('Please select news articles to delete.');
            }
        });
    });
</script>
@endsection
