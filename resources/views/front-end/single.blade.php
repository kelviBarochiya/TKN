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
    <!--    <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#contactModal">-->
    <!--        Get in Touch-->
    <!--    </button>-->
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
<!-- Contact Us Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content shadow-lg rounded-4 border-0" method="POST" action="{{ route('contact.submit') }}">
      @csrf
      <input type="hidden" name="service_name" value="{{ $service->title }}">
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title" id="contactModalLabel">
          <i class="bi bi-envelope-fill me-2"></i>Contact Us
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body py-4 px-4">
        <div class="text-muted small mb-4">
          We'd love to hear from you! Fill out the form below and we'll get back to you shortly.
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Full Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="John Doe" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Email Address</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="you@example.com" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Mobile Number</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="123-456-7890" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Your Message</label>
          <textarea name="message" class="form-control" rows="4" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-1"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger mt-3">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li><i class="bi bi-x-circle me-1"></i>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>

      <div class="modal-footer bg-light rounded-bottom-4 py-3 px-4">
        <button type="submit" class="btn btn-primary w-100">
          <i class="bi bi-send-fill me-1"></i>Send Message
        </button>
      </div>
    </form>
  </div>
</div>


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
