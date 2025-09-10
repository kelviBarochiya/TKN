@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Content Form</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($banner) ? 'Edit Content' : 'Create Content' }}</h5>
                <div class="card-body">
                    <form
                        action="{{ isset($banner) ? route('update.page-contents') : route('save.page-contents') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($banner))
                        <input type="hidden" name="id" value="{{ $banner->id }}">
                        @endif
                        <!-- Page Name -->
                        <div class="mb-3">
                            <label for="page_name" class="form-label">Select Page<span style="color:red;">*</span></label>
                            <select name="page_name" id="page_name" class="form-control">
                                <option value="">Select option</option>
                                @foreach (['about-us','projects','service', 'case-study','faq', 'our-team','newsletter','testimonials'] as $page)
                                    <option value="{{ $page }}"
                                        {{ isset($banner) && $banner->module == $page ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('-', ' ', $page)) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('page_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                         <div class="mb-3">
                            <label for="title" class="form-label">Title<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $banner->title ?? '') }}" >
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description<span
                                    style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="4" >{{ old('description', $banner->description ?? '') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn btn-primary">{{ isset($banner) ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
