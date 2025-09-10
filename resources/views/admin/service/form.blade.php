@extends('layouts.app')

@section('content')

    <div class="layout-container">
            <div class="content-wrapper">
                  
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Service </h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                              
                            </div>
                            <div class="card-body">
                              <form action="@if(isset($service)) {{ route('update.service') }} @else {{ route('save.service') }}  @endif" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (isset($service))
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                @endif

                               {{-- <div class="mb-3">
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
                    </div> --}}

                                
                                <div class="mb-3">
  <label class="form-label" for="basic-default-fullname">Title</label>
  <input 
    type="text" 
    class="form-control" 
    name="title" 
    id="title" 
    value="@if(isset($service) && isset($service->title)) {{ $service->title }} @endif"
  >
  <span class="text-danger">
    @error('title')
      {{ $message }}
    @enderror
  </span>
</div>

<div class="mb-3">
  <label class="form-label" for="slug">Slug (readonly)</label>
  <input 
    type="text" 
    class="form-control" 
    name="slug" 
    id="slug" 
    readonly
    value=""
  >
</div>



                                <div class="mb-3">
                                  <label class="form-label" for="basic-default-company">Content</label>
                                  <textarea name="content" class="ckeditor form-control" id="editor" cols="30" rows="10" value="@if(isset($service) && isset($service->description)) {{ $service->description }} @endif">
                                        @if(isset($service) && isset($service->description)) {{ $service->description }} @endif
                                </textarea>
                                 <span class="text-danger">
                                      @error('content')
                                          {{ $message }}
                                      @enderror
                                </span>
                                </div>
                                
                                
                                 <div class="mb-3">
                                  <label class="form-label" for="basic-default-fullname">Icon class</label>
                                  <input type="text" class="form-control" name="icon_class" id="icon_class" value="@if(isset($service) && isset($service->icon_class)) {{ $service->icon_class }} @endif">
                                    <span class="text-danger">
                                        @error('icon_class')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="Name">Image</label>
                                    @if(isset($service) && isset($service->image))
                                        <img src="{!! asset("public/images/{$service->image}") !!}" height="50" width="50">
                                    @endif
                                    <input type="file" name="image" id="image" value="@if(isset($service) && isset($service->url)) {{ $service->url }} @endif">
                                        <span class="text-danger">
                                            @error('image')
                                                {{ $message }}
                                            @enderror
                                    </span>
                                </div>
                                
                                <!--<div class="mb-3 form-check">-->
                                <!--    <input type="checkbox" class="form-check-input" id="is_home" name="is_home"-->
                                <!--        {{ isset($service) && $service->is_home ? 'checked' : '' }}>-->
                                <!--    <label class="form-check-label" for="is_home">Is Home</label>-->
                                <!--</div>-->
                                
                                <div class="mb-3 form-check">
                                    @php
                                        $isChecked = isset($service) && $service->is_home == 1;
                                        $isDisabled = !$isChecked && isset($homeCount) && $homeCount >= 4;
                                    @endphp
                                
                                    <input type="checkbox" 
                                           class="form-check-input" 
                                           id="is_home" 
                                           name="is_home"
                                           {{ $isChecked ? 'checked' : '' }}
                                           {{ $isDisabled ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="is_home">Is Home</label>
                                
                                    @if($isDisabled)
                                        <div style="color:red; font-weight:bold; margin-top: 5px;">
                                            Maximum of 4 services can be marked for Home. Please remove one from existing Home services before selecting this.
                                        </div>
                                    @endif
                                </div>



                                <div class="mb-3">
                                    <label for="Name">Status</label>
                                    <select name="status" id="status" class="form-control">
                                            <option value="">select option</option>
                                            <option value="1" @if(isset($service) && $service->status == 1) selected  @endif>Active</option>
                                            <option value="0" @if(isset($service) && $service->status == 0)  selected @endif>In-Active</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Save">
                              </form>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                             
    </div>
<!--<script type="text/javascript">-->
<!--    $(document).ready(function(){-->
<!--      $('.ckeditor').ckeditor();-->
<!--    });-->
<!--  </script>-->
  <script>
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ url('/upload-image') }}",
            filebrowserImageUploadUrl: "{{ url('/upload-image') }}"
        });
    </script>
  <script>
  function updateSlug() {
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    let title = titleInput.value;

    // Remove any parentheses and content inside them, including the parentheses themselves
    // e.g. "Business Process Automation (BPA)" -> "Business Process Automation"
    let cleanedTitle = title.replace(/\s*\([^)]*\)/g, '').trim();

    slugInput.value = cleanedTitle;
  }

  // Update slug initially if there's a value already (like when editing)
  updateSlug();

  // Update slug on every input in title
  document.getElementById('title').addEventListener('input', updateSlug);
</script>
  
   <script>
              $('#title').keyup(function() {
                  var replaceSpace = $(this).val();
                  var lower = replaceSpace.toLowerCase();
                  var result = lower.replace(/\s+/g, "-");
                  var APP_URL = {!! json_encode(url('/')) !!}
                  var concate = APP_URL.concat('/').concat(result);
                  $("#url").val(concate);
  
              });
          </script>
@endsection


  