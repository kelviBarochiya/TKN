@extends('layouts.app')

@section('content')

    <div class="layout-container">
            <div class="content-wrapper">
                  
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Slider</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                              
                            </div>
                            <div class="card-body">
                              <form action="@if(isset($slider)) {{ route('update.slider') }} @else {{ route('save.slider') }}  @endif" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (isset($slider))
                                    <input type="hidden" name="slider_id" value="{{ $slider->id }}">
                                @endif
                                
                                <div class="mb-3">
                                        <label for="Name">Image</label>
                                        @if(isset($slider) && isset($slider->image))
                                           <img src="{!! asset("public/images/{$slider->image}") !!}" height="50" width="50">
                                        @endif
                                        <input type="file" name="image" id="image" value="@if(isset($slider) && isset($slider->url)) {{ $slider->url }} @endif">
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
                                            <option value="1" @if(isset($slider) && $slider->status == 1) selected  @endif>Active</option>
                                            <option value="0" @if(isset($slider) && $slider->status == 0)  selected @endif>In-Active</option>
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


  