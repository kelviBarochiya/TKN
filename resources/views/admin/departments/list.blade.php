@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Conditionally Show Add Department Button Based on Permission -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Departments', 'create'))
                <a href="{{ route('departments.create') }}" class="btn btn-primary" style="display:block;float:right;">Add
                    Department</a>&nbsp;
            @endif

            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Departments</h4>

            <!-- Departments Table -->
            <div class="card">
                <h5 class="card-header">Departments Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable"> 
                        <thead>
                            <tr>
                                <th>SRNO</th>
                                <th>Department Name</th>
                                <th>Authorized Person</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>STATUS</th>
                                <!-- Conditionally Show the ACTIONS Column if the User has Edit or Delete Permission -->
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('Departments', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('Departments', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $department->department_name }}</td>
                                    <td>{{ $department->authorized_person_name }}</td>
                                    <td>{{ $department->email }}</td>
                                    <td>{{ $department->phone_number }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-{{ $department->status == 1 ? 'success' : 'danger' }} me-1">
                                            {{ $department->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('Departments', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('Departments', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Conditionally Show Edit Option Based on Permission -->
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Departments', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('departments.edit', $department->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif

                                                    <!-- Conditionally Show Delete Option Based on Permission -->
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Departments', 'delete'))
                                                        <form action="{{ route('departments.destroy', $department->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
