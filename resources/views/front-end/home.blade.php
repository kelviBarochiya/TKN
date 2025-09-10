@include('front-end.header')

<!-- HERO SECTION -->
<section class="hero text-center" style="background: linear-gradient(to right, #004aad, #031c46); color: white; padding: 100px 20px;">
  <div class="container">
    <h1 class="display-4 fw-bold" style="color:#FFF;">Smarter Growth Starts Here</h1>
    <p class="lead mt-3 mb-4" style="
    text-align: center;
">AI-driven cloud solutions to scale your business with intelligence, efficiency, and confidence.</p>
    <a href="https://siyaracloud.com/service/Technical-Support-Services" class="btn btn-warning px-4 py-2 rounded-pill me-3">Our Services</a>
    <a href="https://siyaracloud.com/contact" class="btn btn-outline-light px-4 py-2 rounded-pill">Get in Touch</a>
  </div>
</section>

<!-- ABOUT US SECTION -->
<!--<section class="py-5 bg-light">-->
<!--  <div class="container">-->
<!--    <div class="row align-items-center">-->
<!--      <div class="col-lg-6">-->
<!--          <img src="https://siyaracloud.com/public/images/1749285301.jpg" alt="About Us" class="img-fluid rounded shadow">-->
<!--      </div>-->
<!--      <div class="col-lg-6">-->
<!--        <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>-->
<!--        <h2 class="mb-3">Who We Are</h2>-->
<!--        <p class="mb-4" style="text-align: center;">We are a passionate team of AI experts, engineers, and innovators committed to building transformative cloud platforms that solve real-world business problems.</p>-->
<!--        <a href="/about-us/Company-Overview" class="btn btn-primary rounded-pill px-4">Read More</a>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->

<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <img src="{{ asset('public/images/' . $about->image) }}" alt="{{ $about->title }}" class="img-fluid rounded shadow">
      </div>
      <div class="col-lg-6">
        <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
        <h2 class="mb-3">{{$aboutContent->title}}</h2>
        <!--<p class="mb-4" style="text-align: center;">-->
        <!--  {{ (strip_tags($about->description)) }}-->
        <!--</p>-->
        <p class="mb-4" style="text-align: justify;">
  {{ (html_entity_decode(strip_tags($about->description))) }}
</p>

        <a href="{{ url('/about-us/Company-Overview') }}" class="btn btn-primary rounded-pill px-4">Read More</a>
      </div>
    </div>
  </div>
</section>


<!-- SERVICES SECTION -->
<section id="services" class="py-5">
  <div class="container text-center">
    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Services</div>
    <h2 class="mb-5">{{ $serviceContent->title }}</h2>
    <div class="row g-4">
        @foreach($services as $service)
          <div class="col-md-4">
            <a href="{{ route('front-end.single-service', $service->slug) }}" class="text-decoration-none text-dark">
              <div class="p-4 border rounded h-100">
                <i class="fa {{ $service->icon }} fa-2x text-primary mb-3"></i>
                <h5>{{ $service->title }}</h5>
                <p>{{ Str::limit(html_entity_decode(strip_tags($service->description)), 150) }}</p>
              </div>
            </a>
          </div>
        @endforeach

      <!--<div class="col-md-4">-->
      <!--  <div class="p-4 border rounded h-100">-->
      <!--    <i class="fa fa-brain fa-2x text-primary mb-3"></i>-->
      <!--    <h5>AI Consulting</h5>-->
      <!--    <p>We design AI strategies tailored to your business needs, from ideation to execution.</p>-->
      <!--  </div>-->
      <!--</div>-->
      <!--<div class="col-md-4">-->
      <!--  <div class="p-4 border rounded h-100">-->
      <!--    <i class="fa fa-cloud fa-2x text-primary mb-3"></i>-->
      <!--    <h5>Cloud Platforms</h5>-->
      <!--    <p>Our team builds scalable, secure, and intelligent cloud-native applications.</p>-->
      <!--  </div>-->
      <!--</div>-->
      <!--<div class="col-md-4">-->
      <!--  <div class="p-4 border rounded h-100">-->
      <!--    <i class="fa fa-robot fa-2x text-primary mb-3"></i>-->
      <!--    <h5>AI Automation</h5>-->
      <!--    <p>Automate your workflows using smart bots, language models, and custom AI pipelines.</p>-->
      <!--  </div>-->
      <!--</div>-->
    </div>
  </div>
</section>

<!-- PROJECTS SECTION -->
<section class="bg-light py-5">
  <div class="container text-center">
    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Projects</div>
    <h2 class="mb-4">{{ $CaseStudyContent->title}}</h2>
    <div class="swiper project-swiper">
      <div class="swiper-wrapper">
        @foreach($caseStudy as $case)
          <div class="swiper-slide">
            <!--<a href="{{ route('front-end.category-service', Str::slug($case->title)) }}" class="text-decoration-none text-dark">-->
            <a href="{{ route('front-end.single-project', Str::slug($case->type)) }}" class="text-decoration-none text-dark">
        
              <div class="card shadow border-0 mx-3">
                <img src="{{ asset('public/images/' . $case->image) }}" class="card-img-top" alt="{{ $case->title }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $case->type }}</h5>
                  <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($case->description), 80) }}</p>
                </div>
              </div>
            </a>
          </div>
        @endforeach


        <!--<div class="swiper-slide">-->
        <!--  <div class="card shadow border-0 mx-3">-->
        <!--    <img src="/public/images/project1.jpg" class="card-img-top" alt="Project 1">-->
        <!--    <div class="card-body">-->
        <!--      <h5 class="card-title">Healthcare AI Dashboard</h5>-->
        <!--      <p class="card-text">We developed a HIPAA-compliant platform for patient monitoring using predictive models.</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="swiper-slide">-->
        <!--  <div class="card shadow border-0 mx-3">-->
        <!--    <img src="/public/images/project2.jpg" class="card-img-top" alt="Project 2">-->
        <!--    <div class="card-body">-->
        <!--      <h5 class="card-title">Retail Demand Forecasting</h5>-->
        <!--      <p class="card-text">ML-based solution deployed to forecast inventory and reduce stockouts in e-commerce.</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="swiper-slide">-->
        <!--  <div class="card shadow border-0 mx-3">-->
        <!--    <img src="/public/images/project3.jpg" class="card-img-top" alt="Project 3">-->
        <!--    <div class="card-body">-->
        <!--      <h5 class="card-title">AI Tutor for Schools</h5>-->
        <!--      <p class="card-text">A GPT-powered LMS that enhances learning outcomes with smart quizzes and visual aids.</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <!--  <div class="swiper-slide">-->
        <!--  <div class="card shadow border-0 mx-3">-->
        <!--    <img src="/public/images/project3.jpg" class="card-img-top" alt="Project 3">-->
        <!--    <div class="card-body">-->
        <!--      <h5 class="card-title">AI Tutor for Schools</h5>-->
        <!--      <p class="card-text">A GPT-powered LMS that enhances learning outcomes with smart quizzes and visual aids.</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <!--  <div class="swiper-slide">-->
        <!--  <div class="card shadow border-0 mx-3">-->
        <!--    <img src="/public/images/project3.jpg" class="card-img-top" alt="Project 3">-->
        <!--    <div class="card-body">-->
        <!--      <h5 class="card-title">AI Tutor for Schools</h5>-->
        <!--      <p class="card-text">A GPT-powered LMS that enhances learning outcomes with smart quizzes and visual aids.</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <!--  <div class="swiper-slide">-->
        <!--  <div class="card shadow border-0 mx-3">-->
        <!--    <img src="/public/images/project3.jpg" class="card-img-top" alt="Project 3">-->
        <!--    <div class="card-body">-->
        <!--      <h5 class="card-title">AI Tutor for Schools</h5>-->
        <!--      <p class="card-text">A GPT-powered LMS that enhances learning outcomes with smart quizzes and visual aids.</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
      </div>
      <div class="swiper-pagination mt-4"></div>
    </div>
  </div>
</section>


<!-- TESTIMONIAL SECTION -->
<section class="py-5">
  <div class="container text-center">
    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Testimonials</div>
    <h2 class="mb-5">{{ $testimonialsContent->title}}</h2>
    <div class="row g-4">
         @foreach($testimonials as $testimonial)
        <div class="col-md-4">
          <div class="bg-white border p-4 rounded shadow h-100">
            <p class="mb-4">“{{ strip_tags(html_entity_decode($testimonial->description)) }}”</p>
            <h6 class="mb-0">{{ $testimonial->name }}</h6>
            @if(!empty($testimonial->designation))
              <small class="text-muted">{{ $testimonial->designation }}</small>
            @endif
          </div>
        </div>
      @endforeach
      <!--<div class="col-md-4">-->
      <!--  <div class="bg-white border p-4 rounded shadow h-100">-->
      <!--    <p class="mb-4">“Siyara transformed our cloud infrastructure in just weeks. We're now running 40% faster with better reliability.”</p>-->
      <!--    <h6 class="mb-0">Anjali Desai</h6>-->
      <!--    <small class="text-muted">CTO, FinEdge</small>-->
      <!--  </div>-->
      <!--</div>-->
      <!--<div class="col-md-4">-->
      <!--  <div class="bg-white border p-4 rounded shadow h-100">-->
      <!--    <p class="mb-4">“Their AI chatbot increased our lead conversions by 65% and enhanced customer service.”</p>-->
      <!--    <h6 class="mb-0">Saurabh Mehta</h6>-->
      <!--    <small class="text-muted">Founder, EduScope</small>-->
      <!--  </div>-->
      <!--</div>-->
      <!--<div class="col-md-4">-->
      <!--  <div class="bg-white border p-4 rounded shadow h-100">-->
      <!--    <p class="mb-4">“Professional, scalable, and always one step ahead with technology—Siyara is our go-to tech partner.”</p>-->
      <!--    <h6 class="mb-0">Riya Thomas</h6>-->
      <!--    <small class="text-muted">COO, MedPlus Analytics</small>-->
      <!--  </div>-->
      <!--</div>-->
    </div>
  </div>
</section>

<!-- CTA SECTION -->
<section class="cta py-5 text-white text-center" style="background: linear-gradient(to right, #004aad, #031c46);">
  <div class="container">
    <h2 class="mb-3">Let’s Elevate Your Business with AI</h2>
    <p class="mb-4" style="text-align: center;">Book a personalized consultation and see how Siyara CloudAI LLC can revolutionize your digital journey.</p>
    <a href="/contact" class="btn btn-warning px-4 py-2 rounded-pill">Schedule a Consultation</a>
  </div>
</section>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
//   new Swiper('.project-swiper', {
//     slidesPerView: 1,
//     spaceBetween: 30,
//     loop: true,
//     autoplay: {
//       delay: 3000,
//       disableOnInteraction: false
//     },
//     pagination: {
//       el: '.swiper-pagination',
//       clickable: true,
//     },
//     breakpoints: {
//       768: {
//         slidesPerView: 2,
//       },
//       992: {
//         slidesPerView: 3,
//       },
//     }
//   });

new Swiper('.project-swiper', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: false, // disable loop
  autoplay: {
    delay: 3000,
    disableOnInteraction: false
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
  }
});

</script>
@include('front-end.footer')