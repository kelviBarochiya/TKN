@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Conditionally Show Add Blog Button Based on Permission -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('News and Update', 'create'))
                <a href="{{ route('news_and_update.create') }}" class="btn btn-primary" style="display:block;float:right;">Add
                    News and Update</a>&nbsp;
            @endif

            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> News and Update Tables</h4>

            <!-- Table to List Blogs -->
            <div class="card">
                <h5 class="card-header">News and Update Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SRNO</th>
                                <th>IMAGE</th>
                                <th>TITLE</th>
                                {{-- <th>HEADING</th> --}}
                                <th>DESCRIPTION</th>
                                <th>STATUS</th>
                                <!-- Conditionally Show the ACTIONS Column if the User has Edit or Delete Permission -->
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('News and Update', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('News and Update', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($newsandupdates as $newsandupdate)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if (!empty($newsandupdate->image))
                                            <img src="{{ asset('public/images/' . $newsandupdate->image) }}" alt="Image"
                                                width="50">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{Str::limit( $newsandupdate->title, 20) }}</td>
                                    {{-- <td>{{ $blog->heading }}</td> --}}
                                    <td>{{ Str::limit($newsandupdate->description, 20) }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-{{ $newsandupdate->status == 1 ? 'success' : 'danger' }} me-1">
                                            {{ $newsandupdate->status == 1 ? 'Approved' : 'Rejected' }}
                                        </span>
                                    </td>

                                    <!-- Conditionally Show Actions if User has Edit or Delete Permission -->
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('News and Update', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('News and Update', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Conditionally Show Edit Option Based on Permission -->
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('News and Update', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('news_and_update.edit', $newsandupdate->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif

                                                    <!-- Conditionally Show Delete Option Based on Permission -->
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('News and Update', 'delete'))
                                                        <form
                                                            action="{{ route('news_and_update.destroy', $newsandupdate->id) }}"
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
