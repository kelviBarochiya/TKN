@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Appreciations</h4>

        <!-- Appreciation List Table -->
        <div class="card">
            <h5 class="card-header">Appreciation List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-stripped" id="myTable">
                    <thead>
                        <tr>
                            <th>SRNO</th>
                            <th>Appreciation</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($appreciations as $index => $appreciation)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ Str::limit($appreciation->message, 20) }}</td>
                            <td>
                                <select class="form-control status-dropdown" data-id="{{ $appreciation->id }}">
                                    <option value="pending" {{ $appreciation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $appreciation->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $appreciation->status == 'rejected' ? 'selected' : '' }}>Reject</option>
                                </select>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.appreciations.checkStatus', $appreciation->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Check Details
                                        </a>
                                    </div>
                                </div>
                            </td>
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
    //         var appreciationId = $(this).data('id');
    //         var newStatus = $(this).val();

    //         $.ajax({
    //             url: '{{ route("admin.appreciations.updateStatus") }}',
    //             method: 'POST',
    //             data: {
    //                 _token: '{{ csrf_token() }}',
    //                 id: appreciationId,
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
    // Use event delegation for dynamically loaded rows in DataTable
    $(document).on('change', '.status-dropdown', function () {
        var appreciationId = $(this).data('id');
        var newStatus = $(this).val();

        $.ajax({
            url: '{{ route("admin.appreciations.updateStatus") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: appreciationId,
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
