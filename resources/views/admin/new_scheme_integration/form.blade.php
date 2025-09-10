@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Announcement Form</h4>

        <div class="card">
            <h5 class="card-header">{{ isset($newscheme) ? 'Edit New Scheme Integration' : 'Create New Scheme Integration' }}</h5>
            <div class="card-body">
                <form action="{{ isset($newscheme) ? route('new_scheme_integration.update', $newscheme->id) : route('new_scheme_integration.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($newscheme)
                        @method('PUT')
                    @endisset
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $newscheme->title ?? '') }}" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="heading" class="form-label">Heading</label>
                        <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading', $blog->heading ?? '') }}" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $newscheme->description ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @isset($newscheme)
                            @if(!empty($newscheme->image))
                                <div class="mt-2">
                                    <img src="{{ asset('public/images/' . $newscheme->image) }}" alt="Uploaded Image" width="100">
                                </div>
                            @endif
                        @endisset
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ old('status', $newscheme->status ?? '') == '1' ? 'selected' : '' }}>Approved</option>
                            <option value="0" {{ old('status', $newscheme->status ?? '') == '0' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($newscheme) ? 'Update New Scheme Integration' : 'Create New Scheme Integration' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
