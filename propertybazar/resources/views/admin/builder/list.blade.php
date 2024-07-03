@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <a href="" class="btn btn-danger" id="deleteAllSelected">Delete Selected Builders</a>
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
                                                <h2>Builder Table</h2>
                                            </div>
                                            <div>
                                                <!-- Search form aligned to the right -->
                                                <form method="GET" action="{{ route('admin.builder.list') }}" class="form-inline d-flex justify-content-between">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="search" class="sr-only">Search:</label>
                                                        <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder="Search" value="{{ old('search', $search) }}">
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary btn-sm mb-2">Search</button>
                                                        <a href="{{ route('admin.builder.list') }}" class="btn btn-secondary btn-sm mb-2 ml-2">Refresh</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table id="example" class="table text-fade table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable no-footer" role="grid" aria-describedby="example_info">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>User Id</th>
                                                <th>Name</th>
                                                <th>Membership Id</th>
                                                <th>City</th>
                                                <th>Company</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($builders as $builder)
                                            <tr id="select_ids{{ $builder->id }}">
                                                <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{ $builder->id }}"></td>
                                                <td><a href="{{ route('admin.builder.show', $builder->id) }}" class="text-dark">{{ $builder->id }}</a></td>
                                                <td>{{ $builder->builder_name }}</td>
                                                <td>{{ $builder->membership_id }}</td>
                                                <td>{{ $builder->city }}</td>
                                                <td>{{ $builder->company }}</td>
                                                <td>{{ $builder->phone }}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ route('admin.builder.delete', $builder->id) }}" onclick="deleteCompany({{ $builder->id }})" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="{{ route('admin.builder.show', $builder->id) }}" class="btn btn-success btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8">No builders found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-right">
                                <!-- Pagination links -->
                                {{ $builders->appends(['search' => $search])->links() }}
                            </div>
                        </div>
                    </div>
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</div> <!-- .midde_cont -->

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

            $.ajax({
                url: "{{ route('admin.deleteAll') }}",
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
        });
    });
</script>
@endsection
