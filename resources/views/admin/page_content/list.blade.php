@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add New Banner Button -->
            
                <a href="{{ route('page-contents.create') }}" class="btn btn-primary" style="display:block; float:right;">Create
                    New Content</a>&nbsp;
            
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Page Content</h4>

            <!-- Page Banners Table -->
            <div class="card">
                <h5 class="card-header">Page Content Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="myTable">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Module</th>
                                <th>title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst(str_replace('-', ' ', $banner->module)) }}</td>
                                    
                                    <td>{{ ucfirst(str_replace('-', ' ', $banner->title)) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.page-contents', $banner->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('delete.page-contents', $banner->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Delete
                                                        </a>
                                                   
                                                        
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
