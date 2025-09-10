@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Page Form</h4>

        <div class="card">
            <h5 class="card-header">{{ isset($page) ? 'Edit Page' : 'Create Page' }}</h5>
            <div class="card-body">
                <form action="{{ isset($page) ? route('pages.update', $page->id) : route('pages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($page)
                        @method('PUT')
                    @endisset
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $page->title ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="heading" class="form-label">Heading</label>
                        <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading', $page->heading ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control ckeditor" id="editor" name="description" rows="4" required>{{ old('description', $page->description ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @isset($page)
                        <img src="{{ asset('public/images/' . $page->image) }}" alt="Image" width="100">
                        @endisset
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="1" {{ old('status', $page->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $page->status ?? '') == '0' ? 'selected' : '' }}>In Active</option>
                        </select>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($page) ? 'Update page' : 'Create Page' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ url('/upload-image') }}",
            filebrowserImageUploadUrl: "{{ url('/upload-image') }}"
        });
    </script>
@endsection
