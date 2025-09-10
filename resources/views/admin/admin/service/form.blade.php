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
                                <div class="mb-3">
                                        <label for="Name">Category</label>
                                        <select class="form-control" name="category_id">
                                          <option value="">Select Category</option>
                                          @if(isset($parentCategory) && !empty($parentCategory))
                                             @foreach($parentCategory as $key => $value)
                                               <option value="{{ $value->id }}" @if(isset($service) && $service->category_id == $value->id) selected @endif>{{ $value->title }}</option>
                                             @endforeach
                                          @endif
                                        </select>
                                         <span class="text-danger">
                                               @error('category_id')
                                                   {{ $message }}
                                               @enderror
                                         </span>
                                </div>
                               
                                <div class="mb-3">
                                  <label class="form-label" for="basic-default-fullname">Title</label>
                                  <input type="text" class="form-control" name="title" id="title" value="@if(isset($service) && isset($service->title)) {{ $service->title }} @endif">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="basic-default-company">Content</label>
                                  <textarea name="content" class="ckeditor form-control" id="content" cols="30" rows="10" value="@if(isset($service) && isset($service->content)) {{ $service->content }} @endif">
                                        @if(isset($service) && isset($service->content)) {{ $service->content }} @endif
                                </textarea>
                                 <span class="text-danger">
                                      @error('content')
                                          {{ $message }}
                                      @enderror
                                </span>
                                </div>
                                <!--<div class="mb-3">-->
                                <!--    <label for="Name">Url</label>-->
                                <!--    <input type="text" name="url" class="form-control" id="url" value="@if(isset($service) && isset($service->url)) {{ $service->url }} @endif">-->
                                <!--         <span class="text-danger">-->
                                <!--              @error('url')-->
                                <!--                  {{ $message }}-->
                                <!--              @enderror-->
                                <!--        </span>-->
                                <!--</div>-->
                                
                                {{-- <div class="mb-3">
                                    <label for="Name">Price</label>
                                    <input type="integer" name="price" id="price" class="form-control" value="@if(isset($service) && isset($service->price)) {{ $service->price }} @endif">
                                         <span class="text-danger">
                                              @error('price')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div> --}}
                                
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
                                <div class="mb-3">
                                        <input type="checkbox" class="form-check-input" name="is_feature" id="is_feature"
                                        value="1"
                                        @if (isset($service->is_feature)) {{ $service->is_feature == 1 ? ' checked' : '' }} @endif>
                                    <label class="form-check-label" for="is_slider">Feature</label>
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


  