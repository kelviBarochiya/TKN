@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Suggestion Details</h4>

        <div class="card">
            <h5 class="card-header">Suggestion Details</h5>
            <div class="card-body">
                <p><strong>Department:</strong> {{$suggestion->department->department_name ?? 'N/A'}}</p>
                <p><strong>Name:</strong> {{ $suggestion->name }}</p>
                <p><strong>Father's Name:</strong> {{ $suggestion->father_name }}</p>
                <p><strong>Ward Number:</strong> {{ $suggestion->ward_number }}</p>
                <p><strong>Phone Number:</strong> {{ $suggestion->mobile_number }}</p>
                <p><strong>Message:</strong> {{ $suggestion->message }}</p>
                <p><strong>Suggestion Time:</strong> {{ $suggestion->created_at }}</p>
                {{-- <p><strong>Status:</strong> {{ $suggestion->status }}</p> --}}
            </div>
        </div>
    </div>
</div>
@endsection
