@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New Button -->
            @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('About-Us Content', 'create'))
                <a href="{{ route('about_us.create') }}" class="btn btn-primary" style="float:right; margin-bottom: 15px;">Add
                    New</a>
            @endif

            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> About Us</h4>

            <!-- About Us Table -->
            <div class="card">
                <h5 class="card-header">About Us Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Images</th>
                                @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                        \App\Helpers\CommonHelper::getPermission('About-Us Content', 'edit') ||
                                        \App\Helpers\CommonHelper::getPermission('About-Us Content', 'delete'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aboutUs as $about)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ Str::limit(strip_tags($about->description), 20) }}</td>
                                    <td>
                                        @foreach ($about->images as $image)
                                            <img src="{{ asset('public/' . $image->image_path) }}" width="40"
                                                alt="image">
                                        @endforeach
                                    </td>
                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 ||
                                            \App\Helpers\CommonHelper::getPermission('About-Us Content', 'edit') ||
                                            \App\Helpers\CommonHelper::getPermission('About-Us Content', 'delete'))
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('About-Us Content', 'edit'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('about_us.edit', $about->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1 || \App\Helpers\CommonHelper::getPermission('About-Us Content', 'delete'))
                                                        <form action="{{ route('about_us.destroy', $about->id) }}"
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
