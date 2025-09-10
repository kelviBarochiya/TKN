@extends('layouts.app')

@section('content')

    <div class="layout-container">
            <div class="content-wrapper">
                  
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Image Setting</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                              
                            </div>
                            <div class="card-body">
                                    
                                    <form action="@if(isset($imageSetting)) {{ route('update.image-setting') }} @else {{ route('save.image-setting') }}  @endif" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($imageSetting))
                                            <input type="hidden" name="image_setting_id" value="{{ $imageSetting->id }}">
                                        @endif
                                    <div class="mb-3">
                                        <label for="Name">Master</label>
                                        <select class="form-control" name="module">
                                          <option value="">Select Master</option>
                                          @if(isset($modules) && !empty($modules))
                                             @foreach($modules as $key => $value)
                                               <option value="{{ $value }}" @if(isset($imageSetting) && $imageSetting->module_id == $value) selected @endif>{{ $value }}</option>
                                             @endforeach
                                          @endif
                                        </select>
                                         <span class="text-danger">
                                               @error('module')
                                                   {{ $message }}
                                               @enderror
                                         </span>
                                    </div>
                                <br>
                                <div class="mb-3">
                                        <label for="Name">Width</label>
                           <input type="text" class="form-control" name="width" id="width" value="@if(isset($imageSetting) && isset($imageSetting->width)) {{ $imageSetting->width }} @endif">
                            <span class="text-danger">
                                  @error('width')
                                      {{ $message }}
                                  @enderror
                            </span>
                                </div>
                                <br>
                                <div class="mb-3">
                                        <label for="Name">Height</label>
                           <input type="text" class="form-control" name="height" id="height" value="@if(isset($imageSetting) && isset($imageSetting->height)) {{ $imageSetting->height }} @endif">
                            <span class="text-danger">
                                  @error('height')
                                      {{ $message }}
                                  @enderror
                            </span>
                                </div>
                                <br>
                                <div class="mb-3">
                                        <label for="Name">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">select option</option>
                                            <option value="1" @if(isset($imageSetting) && $imageSetting->status == 1) selected  @endif>Active</option>
                                            <option value="0" @if(isset($imageSetting) && $imageSetting->status == 0)  selected @endif>In-Active</option>
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


  