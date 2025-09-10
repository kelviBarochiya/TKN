@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Conditionally Show Add LifeCycle Button Based on Permission -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('LifeCycles', 'create'))
                <a href="{{ route('lifecycles.create') }}" class="btn btn-primary" style="display:block;float:right;">Add
                    LifeCycle</a>&nbsp;
            @endif

            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> LifeCycles</h4>

            <!-- Categories Table -->
            <div class="card">
                <h5 class="card-header">LifeCycle Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SRNO</th>
                                <th>NAME</th>
                                <th>STATUS</th>
                                <!-- Conditionally Show the ACTIONS Column if the User has Edit or Delete Permission -->
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('LifeCycles', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('LifeCycles', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($lifecycles as $lifecycle)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lifecycle->name }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-{{ $lifecycle->status == 1 ? 'success' : 'danger' }} me-1">
                                            {{ $lifecycle->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <!-- Conditionally Show Actions if User has Edit or Delete Permission -->
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('LifeCycles', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('LifeCycles', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Conditionally Show Edit Option Based on Permission -->
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('LifeCycles', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('lifecycles.edit', $lifecycle->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif

                                                    <!-- Conditionally Show Delete Option Based on Permission -->
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('LifeCycles', 'delete'))
                                                        <form action="{{ route('lifecycles.destroy', $lifecycle->id) }}"
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
