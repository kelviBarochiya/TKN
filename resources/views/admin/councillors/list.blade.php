@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Councillors', 'create'))
                <a href="{{ route('councillors.create') }}" class="btn btn-primary" style="display:block; float:right;">Add New
                    Councillor</a>
            @endif
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Councillor List</h4>

            <div class="card">
                <h5 class="card-header">Councillor Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Municipality Name</th>
                                <th>Ward Number</th>
                                <th>Member Name</th>
                                <th>Mobile Number</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('Councillors', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('Councillors', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($councillors as $councillor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $councillor->municipality_name }}</td>
                                    <td>{{ $councillor->ward_number }}</td>
                                    <td>{{ $councillor->member_name }}</td>
                                    <td>{{ $councillor->mobile_number }}</td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('Councillors', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('Councillors', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Councillors', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('councillors.edit', $councillor->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Councillors', 'delete'))
                                                        <form action="{{ route('councillors.destroy', $councillor->id) }}"
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
