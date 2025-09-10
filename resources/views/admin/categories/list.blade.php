@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Conditionally Show Add Category Button Based on Permission -->

            
                <a href="{{ route('categories.create') }}" class="btn btn-primary" style="display:block;float:right;">Add
                    Category</a>&nbsp;
           
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Categories</h4>

            <!-- Categories Table -->
            <div class="card">
                <h5 class="card-header">Categories Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="category_list">
                        <thead>
                            <tr>
                                <th>SRNO</th>
                                <th>NAME</th>
                                <th>STATUS</th>
                                <!-- Conditionally Show the ACTIONS Column if the User has Edit or Delete Permission -->
                              
                                    <th>ACTIONS</th>
                                
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($categories as $category)
                                <tr>
                                    <!-- Correct SRNO using $loop->iteration -->
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-{{ $category->status == 1 ? 'success' : 'danger' }} me-1">
                                            {{ $category->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <!-- Conditionally Show Actions if User has Edit or Delete Permission -->
                                    
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Conditionally Show Edit Option Based on Permission -->
                                                 
                                                    <a class="dropdown-item"
                                                        href="{{ route('categories.edit', $category->id) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                   

                                                    <!-- Conditionally Show Delete Option Based on Permission -->
                                                  
                                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
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
    <script>
            $(document).ready(function()
            {
                $('#category_list').DataTable();
            });
        </script>  
@endsection
