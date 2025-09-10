@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Add New Button -->
        <a href="{{ route('officers.create') }}" class="btn btn-primary" style="display:block; float:right;">Add New Officer</a>&nbsp;

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Administrative Officers</h4>

        <!-- Officers Table -->
        <div class="card">
            <h5 class="card-header">Administrative Officers</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>SR.NO</th>
                            <th>Profile Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($officers as $officer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('public/images/' . $officer->profile_image) }}" alt="Profile Image" width="50"></td>
                            <td>{{ $officer->name }}</td>
                            <td>{{ $officer->designation }}</td>
                            <td>{{ $officer->email }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('officers.edit', $officer->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('officers.destroy', $officer->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
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
