@extends('layouts.app')

@section('content')
    @php

        $page = \DB::table('pages')->count();
        $service = \DB::table('services')->count();
        $blog = \DB::table('blogs')->count();
        $properties = \DB::table('properties')->where('created_by',auth()->user()->id)->count();
        $projects = \DB::table('projects')->where('created_by',auth()->user()->id)->count();
        $enquiry = \DB::table('inquiries')->count();
        $propertiesEnquiry = \DB::table('single_property_enquiry')->where('type', 'Property')->where('created_by_id',auth()->user()->id)->count();
        $projectEnquiry = \DB::table('single_property_enquiry')->where('type', 'Project')->where('created_by_id',auth()->user()->id)->count();
        $blogEnquiry = \DB::table('single_property_enquiry')->where('type', 'blog')->count();
        $serviceEnquiry = \DB::table('single_property_enquiry')->where('type', 'service')->count();
        $agent = \DB::table('real_estate_agent')->count();
    @endphp

    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

                <div class="col-lg-12 col-md-4 order-1">
                    <div class="row">
                        {{-- @if (auth()->user()->type == 4)
                        @else
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                            </div>
                                        </div>
                                        <a href="{{ route('projects.index') }}"><span
                                                class="fw-semibold d-block mb-1">Projects</span></a>
                                        <h3 class="card-title mb-2">{{ \App\Models\Project::count() }}</h3>
                                    </div>
                                </div>
                            </div>
                         @endif --}}
                    </div>
                </div>

                <div class="col-lg-12 col-md-4 order-1">
                    <div class="row">
                        @if (Auth::user()->type == 1 || getRoleAndPermission(Auth::user()->type, 'project'))
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                            </div>

                                        </div>
                                        <a href="{{ route('project.enquiry') }}"><span
                                                class="fw-semibold d-block mb-1">Project Enquiry</span></a>
                                        <h3 class="card-title mb-2">{{ $projectEnquiry }}</h3>

                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->type == 1 || getRoleAndPermission(Auth::user()->type, 'project'))
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                            </div>

                                        </div>
                                        <a href="{{ route('projects.index') }}"><span
                                                class="fw-semibold d-block mb-1">Project</span></a>
                                        <h3 class="card-title mb-2">{{ $projects }}</h3>

                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->type == 1 || getRoleAndPermission(Auth::user()->type, 'property'))
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                            </div>

                                        </div>
                                        <a href="{{ route('properties.index') }}"><span
                                                class="fw-semibold d-block mb-1">Properties</span></a>
                                        <h3 class="card-title mb-2">{{ $properties }}</h3>

                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->type == 1 || getRoleAndPermission(Auth::user()->type, 'property'))
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                            </div>

                                        </div>
                                        <a href="{{ route('property.enquiry') }}"><span
                                                class="fw-semibold d-block mb-1">Property Enquiry</span></a>
                                        <h3 class="card-title mb-2">{{ $propertiesEnquiry }}</h3>

                                    </div>
                                </div>
                            </div>
                        @endif


                        {{-- @if (Auth::user()->type == 1 || getRoleAndPermission(Auth::user()->type, 'package'))
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                            </div>

                                        </div>
                                        <a href="{{ route('front-end.packages') }}"><span
                                                class="fw-semibold d-block mb-1">Packages</span></a>
                                        <h3 class="card-title mb-2">{{ $packages }}</h3>

                                    </div>
                                </div>
                            </div>
                        @endif --}}
                        @if (Auth::user()->type == 1)
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                            </div>
                                        </div>
                                        <a href="{{ route('packages.index') }}"> <!-- Route for admin -->
                                            <span class="fw-semibold d-block mb-1">Packages</span>
                                        </a>
                                        <h3 class="card-title mb-2">{{ $packages }}</h3>
                                        <!-- This will show the count from controller -->
                                    </div>
                                </div>
                            </div>
                        @elseif (getRoleAndPermission(Auth::user()->type, 'package'))
                            <!-- Example for realtor (user_type 2) -->
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                            </div>
                                        </div>
                                        <a href="{{ route('front-end.packages') }}"> <!-- Route for realtor -->
                                            <span class="fw-semibold d-block mb-1">Packages</span>
                                        </a>
                                        <h3 class="card-title mb-2">{{ $packages }}</h3> <!-- Show count -->
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- <div class="col-lg-3 col-md-12 col-6 mb-4">
                         <div class="card">
                             <div class="card-body">
                                 <div class="card-title d-flex align-items-start justify-content-between">
                                     <div class="avatar flex-shrink-0">
                                         <img src="{!! asset('public/chart-success.png') !!}" alt="chart success" class="rounded" />
                                     </div>
                                 </div>
                                 <a href="{{ route('front-end.packages') }}">
                                     <span class="fw-semibold d-block mb-1">Packages</span>
                                 </a>
                                 <h3 class="card-title mb-2">{{ $packages }}</h3>
                             </div>
                         </div>
                     </div> --}}

                    </div>
                </div>



                <!-- Total Revenue -->


            </div>

        </div>
        <!-- / Content -->


        <div class="content-backdrop fade"></div>
    </div>
@endsection
{{--
@php
$master = \DB::table('masters')->get();
$settingCount = 0;
$imageSettingCount = 0;
$footPrintCount = 0;
$typeCount = 0;
$trainingModelCount = 0;
$whyCount = 0;
$recaptchaCount = 0;
$serviceCount = 0;
$pageCount = 0;
$galleryCount = 0;
$testimonailCount = 0;
$contactCount = 0;
$enquiryCount = 0;
$vendorCount = 0;
foreach($master as $masterKey => $masterValue){
   if($masterValue->name == "Setting" && $masterValue->status == 1){
       $settingCount = 1;
   }
   if($masterValue->name == "Image Setting" && $masterValue->status == 1){
       $imageSettingCount = 1;
   }
   if($masterValue->name == "Foot Print" && $masterValue->status == 1){
       $footPrintCount = 1;
   }
   if($masterValue->name == "Type" && $masterValue->status == 1){
       $typeCount = 1;
   }
   if($masterValue->name == "Training Model" && $masterValue->status == 1){
       $trainingModelCount = 1;
   }
   if($masterValue->name == "Why People Like Us" && $masterValue->status == 1){
       $whyCount = 1;
   }
   if($masterValue->name == "Recaptcha" && $masterValue->status == 1){
       $recaptchaCount = 1;
   }
   if($masterValue->name == "Service" && $masterValue->status == 1){
       $serviceCount = 1;
   }
   if($masterValue->name == "Page" && $masterValue->status == 1){
       $pageCount = 1;
   }
   if($masterValue->name == "Gallery" && $masterValue->status == 1){
       $galleryCount = 1;
   }
   if($masterValue->name == "Testimonials" && $masterValue->status == 1){
       $testimonailCount = 1;
   }
   if($masterValue->name == "Contact" && $masterValue->status == 1){
       $contactCount = 1;
   }
   if($masterValue->name == "Enquiry" && $masterValue->status == 1){
       $$enquiryCount = 1;
   }
   if($masterValue->name == "Vendor" && $masterValue->status == 1){
       $vendorCount = 1;
   }
}
@endphp
{{-- <div class="col-lg-4 col-md-4 order-1"> --}}
{{-- <div class="row">
     
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
           <a href="{{ route('setting.create') }}">
             <img
              src="{!! asset('public/chart-success.png')!!}"
               alt="chart success"
               class="rounded"
             />
             </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Setting</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
 

  
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('image_settings.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Image Setting</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
  
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('footprints.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Foot Print</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
   
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('types.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Type</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
  
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('training-models.index') }}">
             <img
              src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Training Model</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
  
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('why-people-like-us.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1"></span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
  
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('recaptcha.create') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Recaptcha</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
   
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('services.index') }}">
             <img
              src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Service</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
   
   
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('pages.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Page</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
   
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('galleries.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Gallery</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
   
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('testimonails.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Testimonial</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
   
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('contact.create') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Contact</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
  
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('enquiries.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Enquiry</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
  
   <div class="col-lg-4 col-md-12 col-6 mb-4">
     <div class="card">
       <div class="card-body">
         <div class="card-title d-flex align-items-start justify-content-between">
           <div class="avatar flex-shrink-0">
               <a href="{{ route('vendors.index') }}">
             <img
               src="{!! asset('public/chart-success.png')!!}"
               alt="Credit Card"
               class="rounded"
             />
               </a>
           </div>
         </div>
         <span class="fw-semibold d-block mb-1">Vendor</span>
         <h3 class="card-title mb-2"></h3>
       </div>
     </div>
   </div>
   @endif
 </div> --}}
{{-- </div> --}}
