@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Conditionally Show Add Blog Button Based on Permission -->
        {{-- @can('blog-create') --}}
        <a href="{{ route('announcements.create') }}" class="btn btn-primary" style="display:block;float:right;">Add Announcement</a>&nbsp;
        {{-- @endcan --}}

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Announcement Tables</h4>

        <!-- Table to List Blogs -->
        <div class="card">
            <h5 class="card-header">Announcement Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>SRNO</th>
                            <th>IMAGE</th>
                            <th>TITLE</th>
                            {{-- <th>HEADING</th> --}}
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <!-- Conditionally Show the ACTIONS Column if the User has Edit or Delete Permission -->
                            {{-- @if(auth()->user()->can('blog-edit') || auth()->user()->can('blog-delete')) --}}
                            <th>ACTIONS</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($announcements as $announcement)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if(!empty($announcement->image))
                                    <img src="{{ asset('public/images/' . $announcement->image) }}" alt="Image" width="50">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $announcement->title }}</td>
                            {{-- <td>{{ $blog->heading }}</td> --}}
                            <td>{{ Str::limit($announcement->description, 20) }}</td>
                            <td>
                                <span class="badge bg-label-{{ $announcement->status == 1 ? 'success' : 'danger' }} me-1">
                                    {{ $announcement->status == 1 ? 'Approved' : 'Rejected' }}
                                </span>
                            </td>

                            <!-- Conditionally Show Actions if User has Edit or Delete Permission -->
                            {{-- @if(auth()->user()->can('blog-edit') || auth()->user()->can('blog-delete')) --}}
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Conditionally Show Edit Option Based on Permission -->
                                        {{-- @can('blog-edit') --}}
                                        <a class="dropdown-item" href="{{ route('announcements.edit', $announcement->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        {{-- @endcan --}}

                                        <!-- Conditionally Show Delete Option Based on Permission -->
                                        {{-- @can('blog-delete') --}}
                                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                        {{-- @endcan --}}
                                    </div>
                                </div>
                            </td>
                            {{-- @endif --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
