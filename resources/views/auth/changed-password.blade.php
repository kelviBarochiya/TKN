@extends('layouts.app')

@section('content')
    <div class="layout-container">
        <div class="content-wrapper">
            @if (session('status') === 'password-updated')
                <div class="alert alert-success">
                    Password updated successfully!
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    Please correct the errors below.
                </div>
            @endif
            <h2>Change Password</h2>
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Current Password -->
                                    <div class="mb-3">
                                        <label for="current_password">Current Password *</label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control" required autocomplete="current-password">
                                        <span class="text-danger">
                                            @error('current_password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <!-- New Password -->
                                    <div class="mb-3">
                                        <label for="password">New Password *</label>
                                        <input type="password" name="password" id="password" class="form-control" required
                                            autocomplete="new-password">
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <!-- Confirm New Password -->
                                    <div class="mb-3">
                                        <label for="password_confirmation">Confirm New Password *</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" required autocomplete="new-password">
                                        <span class="text-danger">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
