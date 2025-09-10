@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New User Button -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Users', 'create'))
                <a href="{{ route('users.create') }}" class="btn btn-primary" style="display:block; float:right;">
                    <i class="fa fa-plus"></i> Add New User
                </a>
            @endif
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Users</h4>

            <!-- User List Table -->
            <div class="card">
                <h5 class="card-header">User List</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('Users', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('Users', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role ? $user->role->name : 'No Role' }}</td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('Users', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('Users', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Users', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('users.edit', $user->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Users', 'delete'))
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                onclick="return confirm('Are you sure you want to delete this user?')">
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
