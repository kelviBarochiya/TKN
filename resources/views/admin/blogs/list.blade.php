@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Add Blog Button (Create Permission) -->
        @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Blogs', 'create'))
        <a href="{{ route('blogs.create') }}" class="btn btn-primary" style="display:block;float:right;">Add Blog</a>&nbsp;
        @endif

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Blog Tables</h4>

        <!-- Blog Table -->
        <div class="card">
            <h5 class="card-header">Blog Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-stripped" id="myTable">
                    <thead>
                        <tr>
                            <th>SRNO</th>
                            <th>IMAGE</th>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <!-- Check if any action permission exists -->
                            @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Blogs', 'edit') || \App\Helpers\CommonHelper::getPermission('Blogs', 'delete'))
                            <th>ACTIONS</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('public/images/' . $blog->image) }}" alt="Image" width="50">
                            </td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ Str::limit($blog->description, 20) }}</td>
                            <td>
                                <span class="badge bg-label-{{ $blog->status == 1 ? 'success' : 'danger' }} me-1">
                                    {{ $blog->status == 1 ? 'Approved' : 'Rejected' }}
                                </span>
                            </td>

                            <!-- Actions Dropdown -->
                            @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Blogs', 'edit') || \App\Helpers\CommonHelper::getPermission('Blogs', 'delete'))
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">

                                        <!-- Edit Option (Edit Permission) -->
                                        @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Blogs', 'edit'))
                                        <a class="dropdown-item" href="{{ route('blogs.edit', $blog->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        @endif

                                        <!-- Delete Option (Delete Permission) -->
                                        @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Blogs', 'delete'))
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
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
