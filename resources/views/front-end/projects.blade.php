@include('front-end.header')

<div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Our Projects</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/project') }}">Our Projects</a></li>
                            
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


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-light p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Case Start -->
    <div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Case Study</div>
            <h1 class="mb-4">Explore Our Recent AI Case Studies</h1>
        </div>
        <div class="row g-4">
            @foreach($caseStudy as $index => $case)
                <div class="col-lg-4 wow fadeIn" data-wow-delay="{{ 0.3 + ($index * 0.2) }}s">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                        <!--<img class="img-fluid" src="{{ asset('public/images/' . $case->image) }}" alt="{{ strip_tags($case->type) }}">-->
                        <a class="case-overlay text-decoration-none" href="#">
                            <small>{{ strip_tags($case->type) }}</small>
                            <h5 class="lh-base text-white mb-3">{{ strip_tags($case->type) }}</h5>
                            <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    <!-- Case End -->



@include('front-end.footer')