@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New Role Button -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || getPermission('Roles', 'create'))
                <a href="{{ route('roles.create') }}" class="btn btn-primary" style="display:block; float:right;">
                    <i class="fa fa-plus"></i> Add Role
                </a>
            @endif
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Roles</h4>

            <!-- Roles Table -->
            <div class="card">
                <h5 class="card-header">Roles Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Role Name</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        getPermission('Roles', 'edit') ||
                                        getPermission('Roles', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            getPermission('Roles', 'edit') ||
                                            getPermission('Roles', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || getPermission('Roles', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('roles.edit', $role->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || getPermission('Roles', 'delete'))
                                                        <form action="{{ route('roles.destroy', $role->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                onclick="return confirm('Are you sure you want to delete this role?')">
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
