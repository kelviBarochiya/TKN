@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Event Form</h4>

            <div class="card">
                <h5 class="card-header">{{ isset($event) ? 'Edit Event' : 'Create Event' }}</h5>
                <div class="card-body">
                    <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($event)
                            @method('PUT')
                        @endisset

                        <div class="mb-3">
                            <label for="event_name" class="form-label">Event Name<span style="color: red;">*</span></label>
                            <input type="text" name="event_name" class="form-control"
                                value="{{ old('event_name', $event->event_name ?? '') }}">
                            @error('event_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="event_description" class="form-label">Event Description</label>
                            <textarea name="event_description" class="form-control">{{ old('event_description', $event->event_description ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">Slider Images<span style="color: red;">*</span></label>
                            <div id="image-fields">
                                @if (isset($event) && $event->image_path)
                                    @foreach (explode(',', $event->image_path) as $image)
                                        <div class="image-field d-flex align-items-center mb-2">
                                            <img src="{{ asset('public/' . $image) }}" class="img-thumbnail me-2"
                                                alt="Slider Image" style="width: 100px; height: auto;">
                                            <input type="file" name="images[]" class="form-control me-2">
                                            <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                            <button type="button" class="btn btn-danger remove-image">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="image-field d-flex align-items-center mb-2">
                                        <input type="file" name="images[]" class="form-control me-2">
                                        <button type="button" class="btn btn-danger remove-image">Remove</button>
                                    </div>
                                @endif

                            </div>
                            <button type="button" id="add-image" class="btn btn-secondary">Add Image</button>
                            @error('images')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit"
                            class="btn btn-primary">{{ isset($event) ? 'Update Event' : 'Create Event' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add new image field dynamically
        document.getElementById('add-image').addEventListener('click', function() {
            var imageField = document.createElement('div');
            imageField.classList.add('image-field', 'd-flex', 'align-items-center', 'mb-2');
            imageField.innerHTML = `
            <input type="file" name="images[]" class="form-control me-2" required>
            <button type="button" class="btn btn-danger remove-image">Remove</button>
        `;
            document.getElementById('image-fields').appendChild(imageField);
        });

        // Remove image field dynamically
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-image')) {
                event.target.closest('.image-field').remove();
            }
        });
    </script>
@endsection
