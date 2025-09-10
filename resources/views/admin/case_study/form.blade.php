@extends('layouts.app')

@section('content')


    
    <div class="layout-container">
            <div class="content-wrapper">
                    
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Project</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                              
                            </div>
                           
                            <div class="card-body">
                              <form action="@if(isset($caseStudy)) {{ route('update.case_study') }} @else {{ route('save.case_study') }}  @endif" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (isset($caseStudy))
                                  <input type="hidden" name="case_study_id" id="case_study_id" value="{{ $caseStudy->id }}">
                                @endif
                                
                                
                                <div class="mb-3">
                                        <label for="Name">Type<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="type" id="type" value="@if(isset($caseStudy) && isset($caseStudy->type)) {{ $caseStudy->type }} @endif">
                                         <span class="text-danger">
                                               @error('type')
                                                   {{ $message }}
                                               @enderror
                                         </span>
                                </div>
                                
                                
                                <div class="mb-3">
                                        <label for="Name">Description<span style="color: red;">*</span></label>
                                        <textarea name="description" class="ckeditor form-control" id="editor" cols="30" rows="10" value="@if(isset($caseStudy) && isset($caseStudy->description)) {{ $caseStudy->description }} @endif">
                                                @if(isset($caseStudy) && isset($caseStudy->description)) {{ $caseStudy->description }} @endif
                                        </textarea>
                                         <span class="text-danger">
                                              @error('description')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div>
                                <div class="mb-3">
                            <label for="image" class="form-label">Image<span style="color: red;">*</span><p>(For home page case study front image)</p></label>
                            <input type="file" class="form-control" id="image" name="image">
                            @isset($caseStudy->image)
                                <img src="{{ asset('public/images/' . $caseStudy->image) }}" alt="Image" width="100">
                            @endisset
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                                    
                              
                                
                                
                                <div class="mb-3">
                                        <label for="Name">Status<span style="color: red;">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">select option</option>
                                            <option value="1" @if(isset($caseStudy) && $caseStudy->status == 1) selected  @endif>Active</option>
                                            <option value="0" @if(isset($caseStudy) && $caseStudy->status == 0)  selected @endif>In-Active</option>
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
<script>
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ url('/upload-image') }}",
            filebrowserImageUploadUrl: "{{ url('/upload-image') }}"
        });
    </script>
  

@endsection


  