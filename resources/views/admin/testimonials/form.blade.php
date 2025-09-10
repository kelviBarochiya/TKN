@extends('layouts.app')

@section('content')

    <div class="layout-container">
            <div class="content-wrapper">
                  
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @if(isset($testimonial))
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit Testimonial</h4>
                        @else 
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Testimonial</h4>
                        @endif
        
                      <!-- Basic Layout -->
                      <div class="row">
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                              
                            </div>
                            <div class="card-body">
                                <form action="@if(isset($testimonial)) {{ route('update.testimonail') }} @else {{ route('save.testimonail') }}  @endif" method="post" style="padding: 25px;" enctype="multipart/form-data">
                                @csrf
                                @if (isset($testimonial))
                                    <input type="hidden" name="testimonial_id" value="{{ $testimonial->id }}">
                                @endif
                                <div class="mb-3">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="@if(isset($testimonial) && isset($testimonial->name)) {{ $testimonial->name }} @endif">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="Name">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="@if(isset($testimonial) && isset($testimonial->email)) {{ $testimonial->email }} @endif">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="Name">Description</label>
                                    <textarea name="description" class="ckeditor form-control" id="description" cols="30" rows="10"         value="@if(isset($testimonial) && isset($testimonial->description)) {{ $testimonial->description }}     @endif">
                                        @if(isset($testimonial) && isset($testimonial->description)) {{ $testimonial->description }} @endif
                                    </textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="Name">Image</label>
                                    @if(isset($testimonial) && isset($testimonial->image))
                                        <img src="{!! asset("public/images/{$testimonial->image}") !!}" height="50" width="50">
                                    @endif
                                    <input type="file" name="image" id="image" value="@if(isset($testimonial) && isset($testimonial->url)) {{ $testimonial->url }} @endif">
                                    <span class="text-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                
                                
                                <div class="mb-3">
                                    <label for="Name">Status</label>
                                    <select name="status" id="status" class="form-control">
                                            <option value="">select option</option>
                                            <option value="1" @if(isset($testimonial) && $testimonial->status == 1) selected  @endif>Active</option>
                                            <option value="0" @if(isset($testimonial) && $testimonial->status == 0)  selected @endif>In-Active</option>
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
<script type="text/javascript">
    $(document).ready(function(){
      $('.ckeditor').ckeditor();
    });
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


  
