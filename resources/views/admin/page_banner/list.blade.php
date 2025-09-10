@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New Banner Button -->
                <a href="{{ route('page-banners.create') }}" class="btn btn-primary" style="display:block; float:right;">Create
                    New Banner</a>&nbsp;
            
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Page Banners</h4>

            <!-- Page Banners Table -->
            <div class="card">
                <h5 class="card-header">Page Banners Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Page Name</th>
                                <th>Image</th>
                                
                                    <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst(str_replace('-', ' ', $banner->page_name)) }}</td>
                                    <td><img src="{{ asset('public/images/' . $banner->image) }}" alt="Banner Image"
                                            width="100"></td>
                                    
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('page-banners.edit', $banner->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                        <form action="{{ route('page-banners.destroy', $banner->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </button>
                                                        </form>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
