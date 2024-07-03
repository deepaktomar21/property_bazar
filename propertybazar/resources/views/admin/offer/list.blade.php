@extends('admin.layouts.app')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                          <a href="{{route('admin.deleteAll')}}" class="btn btn-danger" id="deleteAllSelected">Delete Selected Users</a>
                        
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
                                                    <h2>Offer/Schemes Table</h2>
                                                </div>
                                                <div>
                                                    <!-- Search form aligned to the right -->
                                                    <form method="GET" action="{{ route('admin.offer.list') }}" class="form-inline d-flex justify-content-between">
                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label for="search" class="sr-only">Search:</label>
                                                            <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder="Search" value="{{ old('search', $search) }}">
                                                        </div>
                                                        <div>
                                                            <button type="submit" class="btn btn-primary btn-sm mb-2">Search</button>
                                                            <a href="{{ route('admin.offer.list') }}" class="btn btn-secondary btn-sm mb-2 ml-2">Refresh</a>
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
                                                    <th>Select</th>
                                                    <th>User Id</th>
                                                    <th>Building Name</th>
                                                    <th>Location</th>
                                                    <th>Images</th>
                                                    <th>Contact Number</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($offers->isNotEmpty())
                                                    @foreach ($offers as $offer)
                                                        <tr id="select_ids{{ $offer->id }}">
                                                            <td><input type="checkbox" name="ids" class="checkbox_ids" id="checkbox_ids" value="{{ $offer->id }}"></td>
                                                            <td><a href="{{ $offer->id }}/show" class="text-dark"> {{ $offer->id }}</a></td>
                                                            <td>{{ $offer->building_name }}</td>
                                                            <td>{{ $offer->location }}</td>
                                                            <td>
                                                                <b>
                                                                    <img src="{{ asset('https://textcode.co.in/propertybazar/public/uploads/' . $offer->images) }}" class="rounded" width="30" />
                                                                </b>
                                                            </td>
                                                            <td>{{ $offer->contact_number }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    
                                                                    <a href="{{ route('admin.offer.delete', $offer->id) }}" onclick="deleteCompany({{ $offer->id }})" class="btn btn-danger btn-sm mr-1">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.offer.show', $offer->id) }}" class="btn btn-success btn-sm">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" class="text-center">No offers found.</td>
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
                                    {{ $offers->appends(['search' => $search])->links() }}
                                </div>
                            </div>
                        </div>
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->

           <script>
document.getElementById('deleteAllSelected').addEventListener('click', function() {
    var selectedIds = [];
    document.querySelectorAll('.userCheckbox:checked').forEach(function(checkbox) {
        selectedIds.push(checkbox.value);
    });

    if (selectedIds.length > 0) {
        fetch('{{ route('admin.deleteAll') }}', {
            method: 'get', // Make sure your route is configured to accept DELETE requests
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for security
            },
            body: JSON.stringify({ ids: selectedIds })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Users have been deleted');
                location.reload(); // Refresh the page to reflect changes
            } else {
                alert('An error occurred: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting users.');
        });
    } else {
        alert('Please select at least one user to delete.');
    }
});

document.getElementById('selectAll').addEventListener('change', function() {
    var checkboxes = document.querySelectorAll('.userCheckbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = this.checked;
    }, this);
});

    </script>
@endsection
