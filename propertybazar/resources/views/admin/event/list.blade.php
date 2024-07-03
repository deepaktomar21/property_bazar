@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <a href="#" class="btn btn-danger" id="deleteAllSelected">Delete Selected Event</a>
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
                                                <h2>Event Table</h2>
                                            </div>
                                            <div>
                                                <!-- Search form aligned to the right -->
                                                <form method="GET" action="{{ route('admin.event.list') }}" class="form-inline d-flex justify-content-between">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="search" class="sr-only">Search:</label>
                                                        <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder="Search" value="{{ $search }}">
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary btn-sm mb-2">Search</button>
                                                        <a href="{{ route('admin.event.list') }}" class="btn btn-secondary btn-sm mb-2 ml-2">Refresh</a>
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
                                                <th>Event Id</th>
                                                <th>Event Date</th>
                                                <th>Event Charge</th>
                                                <th>Event Description</th>
                                                <th>Images</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($events as $eventItem)
                                            <tr id="select_ids{{ $eventItem->id }}">
                                                <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{ $eventItem->id }}"></td>
                                                <td><a href="{{ route('admin.event.show', $eventItem->id) }}" class="text-dark">{{ $eventItem->id }}</a></td>
                                                <td>{{ $eventItem->event_date }}</td>
                                                <td>{{ $eventItem->event_charge }}</td>
                                                <td>{{ $eventItem->event_description }}</td>
                                                <td>
                                                    <img src="{{ asset('propertybazar/public/uploads/' . $eventItem->image) }}" class="rounded" width="30" alt="Event Image">
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.event.edit', $eventItem->id) }}" class="btn btn-primary btn-sm mr-1">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.event.delete', $eventItem->id) }}" onclick="deleteEvent({{ $eventItem->id }})" class="btn btn-danger btn-sm mr-1">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="{{ route('admin.event.show', $eventItem->id) }}" class="btn btn-success btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No Events found.</td>
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
                                {{ $events->appends(['search' => $search])->links() }}
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
                if (confirm('Are you sure you want to delete selected events?')) {
                    $.ajax({
                        url: "", // Correct route URL for deleting all selected events
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
                alert('Please select events to delete.');
            }
        });
    });
</script>
@endsection
