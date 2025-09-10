@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> {{ isset($officer) ? 'Edit' : 'Add' }} Administrative Officer</h4>

        <div class="card">
            <h5 class="card-header">{{ isset($officer) ? 'Edit Administrative Officer' : 'Create Administrative Officer' }}</h5>
            <div class="card-body">
                <form action="{{ isset($officer) ? route('officers.update', $officer->id) : route('officers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($officer))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="profile_image" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" name="profile_image" id="profile_image">
                        @if(isset($officer))
                            <img src="{{ asset('public/images/' . $officer->profile_image) }}" width="100">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $officer->name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" name="designation" id="designation" value="{{ old('designation', $officer->designation ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $officer->email ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address">{{ old('address', $officer->address ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number', $officer->phone_number ?? '') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">{{ isset($officer) ? 'Update Administrative Officer' : 'Create Administrative Officer' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
