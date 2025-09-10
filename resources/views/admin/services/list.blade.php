@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New Button -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Services', 'create'))
                <a href="{{ route('services.create') }}" class="btn btn-primary mb-3" style="display:block; float:right;">Add
                    New Service</a>&nbsp;
            @endif
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Services</h4>

            <!-- Services Table -->
            <div class="card">
                <h5 class="card-header">Services Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>STATUS</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('Services', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('Services', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($service->description, 50) }}</td>
                                    <td>
                                        @if ($service->image)
                                            <img src="{{ asset('public/images/' . $service->image) }}" alt="Service Image"
                                                width="50">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-label-{{ $service->status == 1 ? 'success' : 'danger' }} me-1">
                                            {{ $service->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('Services', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('Services', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Services', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('services.edit', $service->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Services', 'delete'))
                                                        <form action="{{ route('services.destroy', $service->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No services found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
