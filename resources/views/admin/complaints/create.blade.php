@extends('admin.layouts.app')

@section('content')
    <h2>Raise a New Complaint</h2>

    <form action="{{ route('admin.complaints.store') }}" method="POST">
        @csrf
        <input type="text" name="mobile_number" placeholder="Mobile Number" required>
        <textarea name="description" placeholder="Complaint Description" required></textarea>
        <button type="submit">Submit</button>
    </form>
@endsection
