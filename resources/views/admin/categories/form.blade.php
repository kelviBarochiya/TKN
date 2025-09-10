@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Category Form</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h5>
                <div class="card-body">
                    <form
                        action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                        method="POST">
                        @csrf
                        @isset($category)
                            @method('PUT')
                        @endisset

                        <!-- Category Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $category->name ?? '') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                            <select class="form-control" id="status" name="status">
                                <option value="">Select Category</option>
                                <option value="1"
                                    {{ old('status', $category->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0"
                                    {{ old('status', $category->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn btn-primary">{{ isset($category) ? 'Update Category' : 'Create Category' }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
