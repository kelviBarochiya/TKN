@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Suggestions</h4>

        <!-- Suggestions Table -->
        <div class="card">
            <h5 class="card-header">Suggestions Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-stripped"  id="myTable">
                    <thead>
                        <tr>
                            <th>SRNO</th>
                            <th>DEPARTMENT</th>
                            <th>NAME</th>
                            <th>FATHER'S NAME</th>
                            <th>WARD NUMBER</th>
                            <th>PHONE NUMBER</th>
                            <th>MESSAGE</th>
                            {{-- <th>STATUS</th> --}}
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($suggestions as $index => $suggestion)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $suggestion->department->department_name ?? 'N/A' }}</td>
                            <td>{{ $suggestion->name }}</td>
                            <td>{{ $suggestion->father_name }}</td>
                            <td>{{ $suggestion->ward_number }}</td>
                            <td>{{ $suggestion->mobile_number }}</td>
                            <td>{{ Str::limit($suggestion->message, 20) }}</td>
                            {{-- <td>
                                <form action="{{ route('admin.suggestions.updateStatus', $suggestion->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="New" {{ $suggestion->status == 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Assigned" {{ $suggestion->status == 'Assigned' ? 'selected' : '' }}>Assigned</option>
                                        <option value="In Progress" {{ $suggestion->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Pending" {{ $suggestion->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Resolved" {{ $suggestion->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                        <option value="Re-Open" {{ $suggestion->status == 'Re-Open' ? 'selected' : '' }}>Re-Open</option>
                                        <option value="Closed" {{ $suggestion->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </form>
                            </td> --}}
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        {{-- <a class="dropdown-item" href="{{ route('admin.suggestions.show', $suggestion->id) }}">
                                            <i class="bx bx-show me-1"></i> View
                                        </a> --}}
                                        <a class="dropdown-item" href="{{ route('admin.suggestions.show', $suggestion->id) }}">
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
@endsection
