@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New Button -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Holiday List', 'create'))
                <a href="{{ route('holidays.create') }}" class="btn btn-primary" style="display:block; float:right;">Add New
                    Holiday</a>&nbsp;
            @endif
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Holidays</h4>

            <!-- Holidays Table -->
            <div class="card">
                <h5 class="card-header">Holiday List</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Event Name</th>
                                <th>Date</th>
                                <th>Day</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('Holiday List', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('Holiday List', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($holidays as $holiday)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $holiday->event_name }}</td>
                                    {{-- <td>{{ $holiday->date }}</td> --}}
                                    <td>{{ $holiday->holiday_type === 'single' ? $holiday->date : $holiday->start_date . ' to ' . $holiday->end_date }}
                                    </td>
                                    <td>{{ $holiday->day }}</td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('Holiday List', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('Holiday List', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Holiday List', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('holidays.edit', $holiday->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Holiday List', 'delete'))
                                                        <form action="{{ route('holidays.destroy', $holiday->id) }}"
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
