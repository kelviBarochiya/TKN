@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Forms /</span> 
            {{ isset($service) ? 'Edit Service' : 'Create Service' }}
        </h4>

        <div class="card">
            <h5 class="card-header">{{ isset($service) ? 'Edit Service' : 'Create Service' }}</h5>
            <div class="card-body">
                <form 
                    action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($service))
                        @method('PUT')
                    @endif

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $service->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title<span style="color: red;">*</span></label>
                        <input 
                            type="text" 
                            name="title" 
                            class="form-control" 
                            id="title" 
                            value="{{ old('title', $service->title ?? '') }}" 
                            >
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea 
                            name="description" 
                            class="form-control" 
                            id="description" 
                            rows="3">{{ old('description', $service->description ?? '') }}</textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @if (isset($service) && $service->image)
                            <img src="{{ asset('public/images/' . $service->image) }}" alt="Service Image" class="mt-2" style="width: 100px;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                        <select class="form-control" id="status" name="status" >
                            <option value="1" {{ old('status', $service->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $service->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ isset($service) ? 'Update Service' : 'Create Service' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
