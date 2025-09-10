@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Banner Form</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($banner) ? 'Edit Banner' : 'Create Banner' }}</h5>
                <div class="card-body">
                    <form
                        action="{{ isset($banner) ? route('page-banners.update', $banner->id) : route('page-banners.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($banner)
                            @method('PUT')
                        @endisset

                        <!-- Page Name -->
                        <div class="mb-3">
                            <label for="page_name" class="form-label">Select Page<span style="color:red;">*</span></label>
                            <select name="page_name" id="page_name" class="form-control">
                                @foreach (['about-us','projects','service', 'blog', 'mission-vission', 'blog-details', 'contact', 'gallery', 'gallery-images', 'video'] as $page)
                                    <option value="{{ $page }}"
                                        {{ isset($banner) && $banner->page_name == $page ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('-', ' ', $page)) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('page_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Banner Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Banner Image<span
                                    style="color:red;">*</span></label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if (isset($banner))
                                <img src="{{ asset('public/images/' . $banner->image) }}" alt="Banner Image" width="100"
                                    class="mt-2">
                            @endif
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn btn-primary">{{ isset($banner) ? 'Update Banner' : 'Create Banner' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
