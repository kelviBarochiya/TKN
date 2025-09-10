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
                                    <form action="@if(isset($PageDetail)) {{ route('update.page-detail') }} @else {{ route('save.page-detail') }}  @endif" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($PageDetail))
                                            <input type="hidden" name="page_detail_id" value="{{ $PageDetail->id }}">
                                        @endif
                                    <div class="mb-3">
                                        <label for="Name">Module</label>
                                        <select class="form-control" name="module">
                                          <option value="">Select Master</option>
                                          @if(isset($modules) && !empty($modules))
                                             @foreach($modules as $key => $value)
                                               <option value="{{ $value }}" @if(isset($PageDetail) && $PageDetail->module == $value) selected @endif>{{ $value }}</option>
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
                                        <label for="Name">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" value="@if(isset($PageDetail) && isset($PageDetail->title)) {{ $PageDetail->title }} @endif">
                                            <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                            </span>
                                    </div>
                                <br>
                                <div class="mb-3">
                                        <label for="Name">Description</label>
                                        <textarea name="description" class="ckeditor form-control" id="description" cols="30" rows="10" value="@if(isset($PageDetail) && isset($PageDetail->description)) {{ $PageDetail->description }} @endif">
                                                @if(isset($PageDetail) && isset($PageDetail->description)) {{ $PageDetail->description }} @endif
                                        </textarea>
                                         <span class="text-danger">
                                              @error('description')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div>
                                
                                <div class="mb-3">
                                        <label for="Name">Image</label>
                                        @if(isset($PageDetail) && isset($PageDetail->image))
                                           <img src="{!! asset("public/images/{$PageDetail->image}") !!}" height="50" width="50">
                                        @endif
                                        <input type="file" name="image" id="image" value="@if(isset($PageDetail) && isset($PageDetail->image)) {{ $PageDetail->image }} @endif">
                                         <span class="text-danger">
                                              @error('image')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div>
                                <br>
                                <div class="mb-3">
                                        <label for="Name">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">select option</option>
                                            <option value="1" @if(isset($PageDetail) && $PageDetail->status == 1) selected  @endif>Active</option>
                                            <option value="0" @if(isset($PageDetail) && $PageDetail->status == 0)  selected @endif>In-Active</option>
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


  