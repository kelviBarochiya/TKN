@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> News and Update Form</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($newsandupdate) ? 'Edit News and Update' : 'Create News and Update' }}</h5>
                <div class="card-body">
                    <form
                        action="{{ isset($newsandupdate) ? route('news_and_update.update', $newsandupdate->id) : route('news_and_update.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($newsandupdate)
                            @method('PUT')
                        @endisset
                        <div class="mb-3">
                            <label for="title" class="form-label">Title<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $newsandupdate->title ?? '') }}" >
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                        <label for="heading" class="form-label">Heading</label>
                        <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading', $blog->heading ?? '') }}" required>
                    </div> --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Description<span
                                    style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="4" >{{ old('description', $newsandupdate->description ?? '') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @isset($newsandupdate)
                                @if (!empty($newsandupdate->image))
                                    <div class="mt-2">
                                        <img src="{{ asset('public/images/' . $newsandupdate->image) }}" alt="Uploaded Image"
                                            width="100">
                                    </div>
                                @endif
                            @endisset
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                            <select class="form-control" id="status" name="status">
                                <option value="1"
                                    {{ old('status', $newsandupdate->status ?? '') == '1' ? 'selected' : '' }}>Active
                                </option>
                                <option value="0"
                                    {{ old('status', $newsandupdate->status ?? '') == '0' ? 'selected' : '' }}>In Active
                                </option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ isset($newsandupdate) ? 'Update News and Update' : 'Create News and Update' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
