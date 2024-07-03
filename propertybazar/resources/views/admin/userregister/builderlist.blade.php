@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <button class="btn btn-danger" id="deleteAllSelected">Delete Selected Users</button>
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
                                                <h2>Register Builder Table</h2>
                                            </div>
                                            <div>
                                                <!-- Search form aligned to the right -->
                                                <form method="GET" action="{{ route('admin.userregister.builderlist') }}" class="form-inline d-flex justify-content-between">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="search" class="sr-only">Search:</label>
                                                        <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder="Search" value="{{ old('search', $search) }}">
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary btn-sm mb-2">Search</button>
                                                        <a href="{{ route('admin.userregister.builderlist') }}" class="btn btn-secondary btn-sm mb-2 ml-2">Refresh</a>
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
                                                <th><input type="checkbox" id="selectAll"></th>
                                                <th>User Id</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($users as $user)
                                            <tr id="select_ids{{ $user->id }}">
                                                <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{ $user->id }}"></td>
                                                <td><a href="{{ route('admin.userregister.show', $user->id) }}" class="text-dark">{{ $user->id }}</a></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="">
                                                        <form action="{{ route('admin.userregister.delete', $user->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('admin.userregister.show', $user->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No users found</td>
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
                                {{ $users->appends(['search' => $search])->links() }}
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
        $("#selectAll").click(function() {
            $(".checkbox_ids").prop('checked', $(this).prop('checked'));
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
                    if(response.success) {
                        $.each(all_ids, function(key, val) {
                            $('#select_ids' + val).remove();
                        });
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
@endsection
