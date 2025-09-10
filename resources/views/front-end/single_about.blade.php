@include('front-end.header')
    <!-- Service Details -->
     <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">{{ $service->title }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="">About Us</a></li>
                            
                        </ol>
                    </nav>
                </div>
                @if(isset($banner))
    <div class="col-lg-6 align-self-end text-center text-lg-end">
        <img class="img-fluid" 
             src="{{ asset('public/images/' . $banner->image) }}" 
             alt="Banner Image" 
             style="max-height: 300px;">
    </div>
@else
    <div class="col-lg-6 align-self-end text-center text-lg-end">
        <img class="img-fluid" 
             src="{{ asset('public/front-end/img/hero-img.png') }}" 
             alt="Default Hero Image" 
             style="max-height: 300px;">
    </div>
@endif

            </div>
        </div>
    </div>
    <!-- Hero End -->
    <div class="container py-5">
    <!--<div class="row align-items-center g-5">-->
        <!-- Left Column: Image -->
    <!--    <div class="col-lg-6 wow fadeInLeft">-->
    <!--        <img src='{!! asset("public/images/{$service->image}") !!}' -->
    <!--             class="img-fluid rounded shadow" -->
    <!--             alt="Predictive Analytics">-->
    <!--    </div>-->

        <!-- Right Column: Content -->
    <!--    <div class="col-lg-6 wow fadeInRight">-->
    <!--        <h2 class="text-primary mb-4">{{ $service->title }}</h2>-->
    <!--        {!! html_entity_decode($service->description) !!}-->
    <!--    </div>-->
    <!--    <div class="text-center mt-5">-->
        
    <!--    </div>-->
    <!--</div>-->
    
    <div class="row align-items-center g-5">
    <!-- Left Column: Image (Only if image exists) -->
    @if(!empty($service->image))
        <div class="col-lg-6 wow fadeInLeft">
            <img src='{!! asset("public/images/{$service->image}") !!}' 
                 class="img-fluid rounded shadow" 
                 alt="{{ $service->title }}">
        </div>
    @endif

    <!-- Right Column: Content (Full width if no image) -->
    <div class="{{ !empty($service->image) ? 'col-lg-6' : 'col-lg-12' }} wow fadeInRight">
        <h2 class="text-primary mb-4">{{ $service->title }}</h2>
        {!! html_entity_decode($service->description) !!}
        
        <!--<div class="text-center mt-5">-->
        <!--    <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#contactModal">-->
        <!--        Get in Touch-->
        <!--    </button>-->
        <!--</div>-->
        <div class="text-center mt-5">
            <a href="{{ route('contact.page') }}" class="btn btn-primary btn-lg">
                Get in Touch
            </a>
        </div>
    </div>
</div>

    <!-- Contact Modal -->


</div>


   @include('front-end.footer')
   
   @if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('contactModal'));
        myModal.show();
    });
</script>
@endif
