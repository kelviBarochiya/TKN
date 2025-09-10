@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Forms /</span>
                {{ isset($video) ? 'Edit Video Presentation' : 'Create Video Presentation' }}
            </h4>

            <div class="card">
                <h5 class="card-header">{{ isset($video) ? 'Edit Video Presentation' : 'Create Video Presentation' }}</h5>
                <div class="card-body">
                    <form
                        action="{{ isset($video) ? route('video_presentations.update', $video->id) : route('video_presentations.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($video))
                            @method('PUT')
                        @endif

                        <!-- YouTube URL -->
                        <div class="mb-3">
                            <label for="youtube_url" class="form-label">YouTube URL<span style="color: red;">*</span></label>
                            <input type="url" name="youtube_url" class="form-control" id="youtube_url"
                                value="{{ old('youtube_url', isset($video) ? $video->youtube_url : '') }}">
                            @error('youtube_url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="approved"
                                    {{ isset($video) && $video->status == 'approved' ? 'selected' : '' }}>Approved
                                </option>
                                <option value="rejected"
                                    {{ isset($video) && $video->status == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            {{ isset($video) ? 'Update Video' : 'Submit Video' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
