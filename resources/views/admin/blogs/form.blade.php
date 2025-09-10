@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Blog Form</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($blog) ? 'Edit Blog' : 'Create Blog' }}</h5>
                <div class="card-body">
                    <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($blog)
                            @method('PUT')
                        @endisset
                        <div class="mb-3">
                            <label for="title" class="form-label">Title<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $blog->title ?? '') }}" >
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                        <label for="heading" class="form-label">Heading</label>
                        <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading', $blog->heading ?? '') }}" >
                    </div> --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Description<span
                                    style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="4" >{{ old('description', $blog->description ?? '') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="image" name="image">
                            @isset($blog)
                                <img src="{{ asset('public/images/' . $blog->image) }}" alt="Image" width="100">
                            @endisset
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                            <select class="form-control" id="status" name="status" >
                                <option value="1" {{ old('status', $blog->status ?? '') == '1' ? 'selected' : '' }}>
                                    active</option>
                                <option value="0" {{ old('status', $blog->status ?? '') == '0' ? 'selected' : '' }}>
                                    In active</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ isset($blog) ? 'Update Blog' : 'Create Blog' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
