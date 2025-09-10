@include('front-end.header')
    <!-- Service Details -->
     <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">{{ $categories->name }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/service') }}">Services</a></li>
                            
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
     <div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Services</div>
            <h1 class="mb-4">{{ $serviceContent->title ?? "" }}</h1>
        </div>
        <div class="row g-4">
            @foreach($services as $index => $case)
                 <div class="col-4 wow fadeIn" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon btn-square">
                                <i class="{{ $case->icon_class ?? 'fa fa-cogs' }} fa-2x"></i>
                            </div>
                            <h5 class="mb-3">{{ $case->title }}</h5>
                            <p>{{ Str::limit(strip_tags($case->description), 100) }}</p>
                            <a class="btn px-3 mt-auto mx-auto" href="{{ route('front-end.single-service', [str_replace(' ', '-', $case->slug)]) }}">
                                Read More
                            </a>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>


</div>

   @include('front-end.footer')
