@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Conditionally Show Add Complaint Button Based on Permission -->
        {{-- @can('complaint-create') --}}
        {{-- <a href="{{ route('complaints.create') }}" class="btn btn-primary" style="display:block;float:right;">Add Complaint</a>&nbsp; --}}
        {{-- @endcan --}}

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Complaints</h4>

        <!-- Complaints Table -->
        <div class="card">
            <h5 class="card-header">Complaints Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-stripped" id="myTable">
                    <thead>
                        <tr>
                            <th>SRNO</th>
                            <th>Complaint ID</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            {{-- <th>Father Name</th> --}}
                            <th>Ward Number</th>
                            {{-- <th>Address</th> --}}
                            <th>Status</th>
                            <!-- Conditionally Show Actions Column if User has Edit or Delete Permission -->
                            {{-- @if(auth()->user()->can('complaint-edit') || auth()->user()->can('complaint-delete')) --}}
                            <th>Actions</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($complaints as $index => $complaint)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $complaint->complaint_id }}</td>
                            <td>{{ $complaint->department->department_name ?? 'N/A' }}</td>
                            <td>{{$complaint->name}}</td>
                            <td>{{ $complaint->mobile_number }}</td>
                            {{-- <td>{{ $complaint->father_name }}</td> --}}
                            <td>{{ $complaint->ward_number }}</td>
                            {{-- <td>{{ \Illuminate\Support\Str::limit($complaint->address, 20) }}</td> --}}

                            <td>
                                <select class="form-control status-dropdown" data-id="{{ $complaint->id }}">
                                    @foreach ($lifecycles as $lifecycle)
                                        <option value="{{ $lifecycle->name }}" {{ $complaint->status == $lifecycle->name ? 'selected' : '' }}>
                                            {{ ucfirst($lifecycle->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <!-- Conditionally Show Actions if User has Edit or Delete Permission -->
                            {{-- @if(auth()->user()->can('complaint-edit') || auth()->user()->can('complaint-delete')) --}}
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.complaints.checkStatus', $complaint->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Check Details
                                        </a>
                                        <a class="dropdown-item" href="{{ URL::to('admin/complaints/view-comments/'.$complaint->id.'') }}">
                                            <i class="bx bx-low-vision me-1"></i>View Comments
                                        </a>
                                    </div>
                                </div>
                            </td>
                            {{-- @endif --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function () {
    //     $('.status-dropdown').change(function () {
    //         var complaintId = $(this).data('id');
    //         var newStatus = $(this).val();

    //         $.ajax({
    //             url: '{{ route("admin.complaints.updateStatus") }}',
    //             method: 'POST',
    //             data: {
    //                 _token: '{{ csrf_token() }}',
    //                 id: complaintId,
    //                 status: newStatus
    //             },
    //             success: function (response) {
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Success',
    //                     text: response.message,
    //                     timer: 2000,
    //                     confirmButtonText: 'OK'
    //                 });
    //             },
    //             error: function (xhr, status, error) {
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Error',
    //                     text: 'Failed to update status',
    //                     confirmButtonText: 'OK'
    //                 });
    //             }
    //         });
    //     });
    // });
    
     $(document).ready(function () {
    // Use event delegation for dynamically loaded rows
    $(document).on('change', '.status-dropdown', function () {
        var complaintId = $(this).data('id');
        var newStatus = $(this).val();

        $.ajax({
            url: '{{ route("admin.complaints.updateStatus") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: complaintId,
                status: newStatus
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 2000,
                    confirmButtonText: 'OK'
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update status',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>
@endsection
