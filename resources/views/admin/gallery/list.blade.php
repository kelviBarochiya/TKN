@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Image Presentation', 'create'))
                <a href="{{ route('events.create') }}" class="btn btn-primary" style="display:block;float:right;">Add
                    Event</a>&nbsp;
            @endif
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Events</h4>

            <!-- Add Event Button -->
            {{-- <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Add Event</a> --}}

            <!-- Events Table -->
            <div class="card">
                <h5 class="card-header">Events List</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Event Name</th>
                                <th>Description</th>
                                <th>Images</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('Image Presentation', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('Image Presentation', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->event_name }}</td>
                                    <td>{{ $event->event_description }}</td>
                                    <td>
                                        <div style="display: flex; gap: 10px;">
                                            @foreach (explode(',', $event->image_path) as $image)
                                                <img src="{{ asset('public/' . $image) }}" alt="Image"
                                                    class="img-thumbnail" style="object-fit: cover;" width="40">
                                            @endforeach
                                        </div>
                                    </td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('Image Presentation', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('Image Presentation', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Image Presentation', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('events.edit', $event->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('Image Presentation', 'delete'))
                                                        <form action="{{ route('events.destroy', $event->id) }}"
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
