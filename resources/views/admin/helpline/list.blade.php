@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New Button -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Helpline Number', 'create'))
                <a href="{{ route('helpline-numbers.create') }}" class="btn btn-primary"
                    style="display:block; float:right;">Add New Helpline Number</a>&nbsp;
            @endif
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Helpline Numbers</h4>

            <!-- Helpline Numbers Table -->
            <div class="card">
                <h5 class="card-header">Helpline Numbers</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Status</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('Helpline Number', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('Helpline Number', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($helplineNumbers as $number)
                                <tr>
                                    <td>{{ $number->id }}</td>
                                    <td>{{ $number->name }}</td>
                                    <td>{{ $number->number }}</td>
                                    <td>
                                        <span class="badge bg-label-{{ $number->status == 1 ? 'success' : 'danger' }} me-1">
                                            {{ $number->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('Helpline Number', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('Helpline Number', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Helpline Number', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('helpline-numbers.edit', $number->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Helpline Number', 'delete'))
                                                        <form action="{{ route('helpline-numbers.destroy', $number->id) }}"
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
