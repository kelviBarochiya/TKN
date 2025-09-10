@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Forms /</span>
            {{ isset($aboutUs) ? 'Edit About Us' : 'Create About Us' }}
        </h4>

        <div class="card">
            <h5 class="card-header">{{ isset($aboutUs) ? 'Edit About Us' : 'Create About Us' }}</h5>
            <div class="card-body">
                <form action="{{ isset($aboutUs) ? route('about_us.update', $aboutUs->id) : route('about_us.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($aboutUs)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input 
                            name="title" 
                            class="form-control" 
                            id="title" 
                            value="{{ old('title', isset($aboutUs) ? $aboutUs->title : '') }}" 
                        >
                    
                        {{-- <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span> --}}
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span style="color:red;">*</span></label>
                        <textarea name="description" class="ckeditor form-control" id="description" cols="30" rows="10" value="@if(isset($aboutUs) && isset($aboutUs->description)) {{ $aboutUs->description }} @endif">
                            @if(isset($aboutUs) && isset($aboutUs->description)) {{ $aboutUs->description }} @else {{ old('description') }} @endif
                        </textarea>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    
                
                    <!-- Images -->
                    <div class="mb-3">
                        <label for="images" class="form-label">Add Images</label>
                        <div id="imageFields">
                            @isset($aboutUs)
                                @foreach ($aboutUs->images as $image)
                                    <div class="image-field" id="image-{{ $image->id }}">
                                        <img src="{{ asset('public/'.$image->image_path) }}" width="100" alt="image">
                                        <input type="file" name="images[]">
                                        <button type="button" class="btn btn-danger remove-image" data-id="{{ $image->id }}">Remove</button>
                                        <!-- Hidden input for marking this image for removal -->
                                        <input type="hidden" name="removed_images[]" value="" class="removed-image" data-id="{{ $image->id }}">
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                        <button type="button" id="addImage" class="btn btn-secondary">Add Image</button>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ isset($aboutUs) ? 'Update About Us' : 'Create About Us' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addImage').addEventListener('click', function() {
        let newField = document.createElement('div');
        newField.classList.add('image-field');
        newField.innerHTML = `
            <input type="file" name="images[]">
            <button type="button" class="btn btn-danger remove-image">Remove</button>
        `;
        document.getElementById('imageFields').appendChild(newField);
    });

    document.getElementById('imageFields').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-image')) {
            const imageField = e.target.closest('.image-field');
            const imageId = e.target.dataset.id;
            
            // If the image has an ID (it's an existing image), mark it for removal
            if (imageId) {
                const hiddenInput = imageField.querySelector('.removed-image');
                hiddenInput.value = imageId; // Set the ID of the image to be removed in the hidden input
            }
            
            // Hide the image field to visually remove it
            imageField.style.display = 'none';
        }
    });
</script>

@endsection
