@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Appreciations Status</h4>

        <div class="card">
            <div class="card-body">
                {{-- <p><strong>Appreciations ID:</strong> {{ $appreciation->appreciation_id }}</p> --}}
                <p><strong>Description:</strong> {{ $appreciation->message }}</p>
                <p><strong>Status:</strong> {{ $appreciation->status }}</p>
                <p><strong>Appreciation Time:</strong> {{ $appreciation->created_at }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
