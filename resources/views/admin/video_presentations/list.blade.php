@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New Video Button -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Video Presentation', 'create'))
                <a href="{{ route('video_presentations.create') }}" class="btn btn-primary mb-3" style="float: right;">Create
                    New Video</a>
            @endif
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Video Presentations</h4>

            <!-- Video Presentations Table -->
            <div class="card">
                <h5 class="card-header">Video Presentations Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>YouTube URL</th>
                                <th>Status</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('Video Presentation', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('Video Presentation', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($videos as $video)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $video->youtube_url }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-{{ $video->status == 'approved' ? 'success' : 'danger' }} me-1">
                                            {{ ucfirst($video->status) }}
                                        </span>
                                    </td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('Video Presentation', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('Video Presentation', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Video Presentation', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('video_presentations.edit', $video->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Video Presentation', 'delete'))
                                                        <form
                                                            action="{{ route('video_presentations.destroy', $video->id) }}"
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
                                    <td colspan="4" class="text-center">No video presentations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
