@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Complaint Status</h4>

            <div class="card">
                <div class="card-body">
                    <p><strong>Complaint ID:</strong> {{ $complaint->complaint_id }}</p>
                    <p><strong>Department:</strong> {{ $complaint->department->department_name ?? 'N/A' }}</p>
                    <p><strong>Mobile Number:</strong> {{ $complaint->mobile_number }}</p>
                    <p><strong>Father Name:</strong> {{ $complaint->father_name }}</p> <!-- New column -->
                    <p><strong>Ward Number:</strong> {{ $complaint->ward_number }}</p> <!-- New column -->
                    <p><strong>Address:</strong> {{ $complaint->address }}</p> <!-- New column -->
                    <p><strong>Status:</strong> {{ $complaint->status }}</p>
                    <p><strong>Description:</strong> {{ $complaint->messages }}</p>
                    <p><strong>Images:</strong></p>
                    <div>
                        @foreach (explode(',', $complaint->images) as $image)
                            <img src="{{ asset('public/'.$image) }}" alt="Complaint Image" style="max-width: 200px; margin-right: 10px;">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
