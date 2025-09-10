@extends('layouts.app')

@section('content')

    <div class="layout-container">
            <div class="content-wrapper">
                  
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Meta Tag</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                              
                            </div>
                            <div class="card-body">
                                    <form action="@if(isset($metaTag)) {{ route('update.meta_tag') }} @else {{ route('save.meta_tag') }}  @endif" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($metaTag))
                                            <input type="hidden" name="meta_tag_id" value="{{ $metaTag->id }}">
                                        @endif
                                        <div class="mb-3">
                                        <label for="Name">Page</label>
                                        <select class="form-control type" name="type">
                                         
                                          <option value="">Select Type</option>
                                           <option value="home" @if(isset($metaTag->type) && $metaTag->type == "home") selected @endif>home</option>
                                          <option value="about-us" @if(isset($metaTag->type) && $metaTag->type == "about-us") selected @endif>about-us</option>
                                          <option value="privacy-policy"  @if(isset($metaTag->type) && $metaTag->type == "privacy-policy") selected @endif>privacy-policy</option>
                                          <option value="term-conditon"  @if(isset($metaTag->type) && $metaTag->type == "term-conditon") selected @endif>term-conditon</option>
                                          <!--<option value="our-team" @if(isset($metaTag->type) && $metaTag->type == "our-team") selected @endif>our-team</option>-->
                                          <!--<option value="projects" @if(isset($metaTag->type) && $metaTag->type == "projects") selected @endif>projects</option>-->
                                          <!--<option value="blog"  @if(isset($metaTag->type) && $metaTag->type == "blog") selected @endif>blog</option>-->
                                          <option value="project"  @if(isset($metaTag->type) && $metaTag->type == "project") selected @endif>project</option>
                                          <!--<option value="jobs"  @if(isset($metaTag->type) && $metaTag->type == "jobs") selected @endif>jobs</option>-->
                                          <option value="faqs"  @if(isset($metaTag->type) && $metaTag->type == "faqs") selected @endif>faqs</option>
                                          <option value="contact"  @if(isset($metaTag->type) && $metaTag->type == "contact") selected @endif>contact</option>
                                          <option value="service"  @if(isset($metaTag->type) && $metaTag->type == "service") selected @endif>service</option>
                                          <option value="aiBusinessSolutions"  @if(isset($metaTag->type) && $metaTag->type == "aiBusinessSolutions") selected @endif>ai powered business solutions</option>
                                          <option value="dataAnalytics"  @if(isset($metaTag->type) && $metaTag->type == "dataAnalytics") selected @endif>data analytics and predictive intelligence</option>
                                          <option value="sustainableSolutions"  @if(isset($metaTag->type) && $metaTag->type == "sustainableSolutions") selected @endif>sustainable digital solutions</option>
                                          <option value="creativeAI"  @if(isset($metaTag->type) && $metaTag->type == "creativeAI") selected @endif>creative ai and generative design</option>
                                          <option value="itSolutions"  @if(isset($metaTag->type) && $metaTag->type == "itSolutions") selected @endif>it and digital transformation solutions</option>
                                          <!--<option value="portfolios"  @if(isset($metaTag->type) && $metaTag->type == "portfolios") selected @endif>portfolios</option>-->
                                          <!--<option value="apply-job"  @if(isset($metaTag->type) && $metaTag->type == "apply-job") selected @endif>apply-job</option>-->
                                          <!--<option value="website-design-price-in-india"  @if(isset($metaTag->type) && $metaTag->type == "website-design-price-in-india") selected @endif>website-design-price-in-india</option>-->
                                          <!--<option value="seo-price-in-india"  @if(isset($metaTag->type) && $metaTag->type == "seo-price-in-india") selected @endif>seo-price-in-india</option>-->
                                        </select>
                                         <span class="text-danger">
                                               @error('type')
                                                   {{ $message }}
                                               @enderror
                                         </span>
                                    </div>
                                         <div class="mb-3">
                                        <label for="Name">Single Page</label>
                                        <select class="form-control module load_sub_page" name="module">
                                          <option value="">Select Master</option>
                                          @if(isset($data) && !empty($data))
                                                @foreach($data as $dataKey => $dataValue)
                                                    <option value="{{ $dataValue }}" @if($metaTag->module == $dataValue) selected @endif>{{ $dataValue }}</option>
                                                @endforeach
                                            @else 
                                                <option value="">Select Sub Page</option>
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
                                        <label for="Name">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" id="meta_title" value="@if(isset($metaTag) && isset($metaTag->meta_title)) {{ $metaTag->meta_title }} @endif">
                                         <span class="text-danger">
                                              @error('meta_title')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div>

                                <div class="mb-3">
                                        <label for="Name">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30" rows="10" value="@if(isset($metaTag) && isset($metaTag->meta_description)) {{ $metaTag->meta_description }} @endif">
                                                @if(isset($metaTag) && isset($metaTag->meta_description)) {{ $metaTag->meta_description }} @endif
                                        </textarea>
                                         <span class="text-danger">
                                              @error('meta_description')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div>

                                <div class="mb-3">
                                        <label for="Name">Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" value="@if(isset($metaTag) && isset($metaTag->meta_keyword)) {{ $metaTag->meta_keyword }} @endif">
                                         <span class="text-danger">
                                              @error('meta_keyword')
                                                  {{ $message }}
                                              @enderror
                                        </span>
                                </div>
                                <br>
                                
                                <br>
                                <div class="mb-3">
                                        <label for="Name">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">select option</option>
                                            <option value="1" @if(isset($metaTag) && $metaTag->status == 1) selected  @endif>Active</option>
                                            <option value="0" @if(isset($metaTag) && $metaTag->status == 0)  selected @endif>In-Active</option>
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
    
    $(document).ready(function()
    {
        $('.module').select2();
        $('.type').select2();
    });

   
  </script>
  <script>
    $(document).on('change','.type',function(e){
        e.preventDefault();

        var page = $(this).val();
        $('.load_sub_page').html('select Sub page');

        if(page == "blog" || page == "project" || page == "portfolios" || page == "service" || page == "about-us"){
        
            $.ajax({
                url : "{{ route('get_sub_page_data') }}",
                method : "post",
                data : {
                    "_token":"{{ csrf_token() }}",
                    page : page
                },
                dataType : 'json',
                success:function(data)
                {
                    // load_sub_page
                $('.load_sub_page').html(data);
                }
            })
        }
    })
  </script>
@endsection


  