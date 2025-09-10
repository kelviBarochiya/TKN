@include('front-end.header')

 <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Terms And Condition</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                              <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/term-condition') }}">Terms And Condition</a></li>
                            
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


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Terms And Conditon</div>
                    <h1 class="mb-4">{{ $term->heading ?? "" }}</h1>
                   {!! html_entity_decode($term->description) !!}
                </div>
            </div>
        </div>
    </div>


@include('front-end.footer')