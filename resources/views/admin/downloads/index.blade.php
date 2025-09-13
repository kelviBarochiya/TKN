@extends('layouts.app')
@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Downloads</h4>

            <!-- Card -->
            <div class="card">
                {{-- <div>
                    @if (session('success'))
                        <div class="alert alert-primary alert-block text-white" id="primary-alert">
                            <strong class="validation_message">{{ session('success') }}</strong>
                        </div>
                    @endif
                </div> --}}

                <h5 class="card-header">Table Basic</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-stripped" id="downloads_list">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                                $count=1
                            @endphp
                            @foreach ($downloads as $download)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $download->email }}</td>
                                    <td>{{ $download->name }}</td>
                                    <td>{{ $download->mobile_number }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a class="dropdown-item"
                                                    href="{{ route('downloads.destroy', $download->id) }}"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Card -->
        </div>
    </div>

    <!-- Scripts -->
    <script>
        $(document).ready(function() {
            $('#downloads_list').DataTable();
        });
    </script>
    <script>
        $("#primary-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#primary-alert").slideUp(500);
        });
    </script>
@endsection
