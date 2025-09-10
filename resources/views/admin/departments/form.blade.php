@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Department Form</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($department) ? 'Edit Department' : 'Create Department' }}</h5>
                <div class="card-body">
                    <form
                        action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}"
                        method="POST">
                        @csrf
                        @isset($department)
                            @method('PUT')
                        @endisset

                        <div class="mb-3">
                            <label for="department_name">Department Name<span style="color: red;">*</span></label>
                            <input type="text" name="department_name" id="department_name" class="form-control"
                                value="{{ old('department_name', $department->department_name ?? '') }}">
                            @error('department_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="authorized_person_name">Authorized Person Name<span style="color: red;">*</span></label>
                            <input type="text" name="authorized_person_name" id="authorized_person_name"
                                class="form-control"
                                value="{{ old('authorized_person_name', $department->authorized_person_name ?? '') }}">
                            @error('authorized_person_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">Email<span style="color: red;">*</span></label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', $department->email ?? '') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number">Phone Number<span style="color: red;">*</span></label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control"
                                value="{{ old('phone_number', $department->phone_number ?? '') }}">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Category Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                            <select class="form-control" id="status" name="status">
                                <option value="1"
                                    {{ old('status', $department->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0"
                                    {{ old('status', $department->status ?? '') == '0' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn btn-primary">{{ isset($department) ? 'Update Department' : 'Create Department' }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
