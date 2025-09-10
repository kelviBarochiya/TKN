@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Forms /</span> {{ isset($user) ? 'Edit User' : 'Create User' }}
        </h4>

        <div class="card">
            <h5 class="card-header">{{ isset($user) ? 'Edit User' : 'Create User' }}</h5>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST" id="userForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id ?? '' }}">

                    <div class="row">
                        <!-- Name -->
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Name<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name', $user->name ?? '') }}" >
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ old('email', $user->email ?? '') }}" >
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Password<span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   {{ isset($user) ? '' : '' }}>
                            @if(isset($user))
                                <small>Leave blank to keep the current password.</small>
                            @endif
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="mb-3 col-md-6">
                            <label for="role_id" class="form-label">Role<span style="color: red;">*</span></label>
                            <select class="form-control" id="role_id" name="role_id" >
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" 
                                            {{ old('role_id', $user->role_id ?? '') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary me-3">
                            {{ isset($user) ? 'Update User' : 'Create User' }}
                        </button>
                        {{-- <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Cancel button functionality
    document.getElementById('cancelButton')?.addEventListener('click', () => {
        document.getElementById('userForm').reset(); // Reset the form fields
    });
</script>
@endsection
