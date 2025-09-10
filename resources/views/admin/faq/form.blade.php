@extends('layouts.app')

@section('content')

    <div class="layout-container">
            <div class="content-wrapper">
                  
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add FAQ</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                              
                            </div>
                            <div class="card-body">
                                <form action="@if(isset($faq)) {{ route('update.faq') }} @else {{ route('save.faq') }}  @endif" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (isset($faq))
                                 <input type="hidden" name="faq_id" value="{{ $faq->id }}">
                                @endif
                                
                                <div class="mb-3">
                                        <label for="Name">Question</label>
                                        <textarea name="question" class="ckeditor form-control" id="question" cols="30" rows="10" value="@if(isset($faq) && isset($faq->question)) {{ $faq->question }} @endif">
                                                @if(isset($faq) && isset($faq->question)) {{ $faq->question }} @endif
                                        </textarea>
                                         <span class="text-danger">
                                              @error('question')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div>
                                <div class="mb-3">
                                        <label for="Name">Answer</label>
                                        <textarea name="answer" class="ckeditor form-control" id="answer" cols="30" rows="10" value="@if(isset($faq) && isset($faq->answer)) {{ $faq->answer }} @endif">
                                                @if(isset($faq) && isset($faq->answer)) {{ $faq->answer }} @endif
                                        </textarea>
                                         <span class="text-danger">
                                              @error('answer')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div>
                               
                                <div class="mb-3">
                                        <label for="Name">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">select option</option>
                                            <option value="1" @if(isset($faq) && $faq->status == 1) selected  @endif>Active</option>
                                            <option value="0" @if(isset($faq) && $faq->status == 0)  selected @endif>In-Active</option>
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


  