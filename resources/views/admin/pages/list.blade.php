@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Conditionally Show Add Page Button Based on Permission -->
        {{-- @can('page-create') --}}
        <a href="{{ route('pages.create') }}" class="btn btn-primary" style="display:block;float:right;">Add Page</a>&nbsp;
        {{-- @endcan --}}

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Page Tables</h4>

        <!-- Table to List Pages -->
        <div class="card">
            <h5 class="card-header">Page Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-stripped" id="pages_list">
                    <thead>
                        <tr>
                            <th>SRNO</th>
                            <th>IMAGE</th>
                            <th>TITLE</th>
                            <th>HEADING</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <!-- Conditionally Show the ACTIONS Column if the User has Edit or Delete Permission -->
                            {{-- @if(auth()->user()->can('page-edit') || auth()->user()->can('page-delete')) --}}
                            <th>ACTIONS</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($pages as $page)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                 @if($page->image != "")
                                <img src="{!! asset("public/images/{$page->image}") !!}" height="50" width="50">
                            @else
                                -
                            @endif
                            </td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->heading }}</td>
                            <td>{{ Str::limit($page->description, 20) }}</td>
                            
                            <td>
                                <span class="badge bg-label-{{ $page->status == 1 ? 'success' : 'danger' }} me-1">
                                    {{ $page->status == 1 ? 'Approved' : 'Rejected' }}
                                </span>
                            </td>

                            <!-- Conditionally Show Actions if User has Edit or Delete Permission -->
                            {{-- @if(auth()->user()->can('page-edit') || auth()->user()->can('page-delete')) --}}
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Conditionally Show Edit Option Based on Permission -->
                                        {{-- @can('page-edit') --}}
                                        <a class="dropdown-item" href="{{ route('pages.edit', $page->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        {{-- @endcan --}}

                                        <!-- Conditionally Show Delete Option Based on Permission -->
                                        {{-- @can('page-delete') --}}
                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
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
<script>
            $(document).ready(function()
            {
                $('#pages_list').DataTable();
            });
        </script>  
@endsection
