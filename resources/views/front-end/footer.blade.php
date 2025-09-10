@php
$setting = \DB::table('settings')->first();
$contact = \DB::table('contact_us')->first();
$services = \DB::table('services')->skip(0)->take(5)->orderBy('id','desc')->get();

@endphp
  <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
    <div class="container py-5">
        <div class="row g-5">

            {{-- Company Info --}}
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <a href="{{url('/')}}" class="d-inline-block mb-3">
                    <h6 class="text-white"><img src='{!! asset("public/images/{$setting->logo}") !!}' width="75%"></h6>
                </a>
                <p class="mb-0">
                    {{ isset($setting->footer_content) ? strip_tags($setting->footer_content) : '' }}
                </p>
            </div>

            {{-- Contact Info --}}
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
               <h5 class="text-white mb-4">Get In Touch</h5>

{{-- Address --}}
<!--<p><i class="fa fa-map-marker-alt me-3"></i>{{ $contact->address1 ?? '' }}</p>-->
<!--<p><i class="fa fa-map-marker-alt me-3"></i>{!! nl2br(e($contact->address1 ?? '')) !!}</p>-->
@php
    $fullAddress = implode("\n", array_filter([
        $contact->address1 ?? '',
        $contact->address2 ?? '',
        $contact->address3 ?? ''
    ]));
@endphp

<p><i class="fa fa-map-marker-alt me-3"></i>{!! nl2br(e($fullAddress)) !!}</p>

{{-- Mobile Numbers --}}
@php
    $mobileNumbers = array_filter([
        $contact->mobile_number1 ?? null,
        $contact->mobile_number2 ?? null,
        $contact->mobile_number3 ?? null,
    ]);
@endphp

@foreach ($mobileNumbers as $mobile)
    <p>
        <i class="fa fa-phone-alt me-3"></i>
        <a href="tel:{{ $mobile }}" class="text-white text-decoration-none">{{ $mobile }}</a>
    </p>
@endforeach

{{-- Emails --}}
@php
    $emails = array_filter([
        $contact->email1 ?? null,
        $contact->email2 ?? null,
        $contact->email3 ?? null,
    ]);
@endphp

@foreach ($emails as $email)
    <p>
        <i class="fa fa-envelope me-3"></i>
        <a href="mailto:{{ $email }}" class="text-white text-decoration-none">{{ $email }}</a>
    </p>
@endforeach



                <div class="d-flex pt-2">
                    @if(!empty($setting->facebook))
                        <a class="btn btn-outline-light btn-social" href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                   @if(!empty($setting->twitter))
                        <a class="btn btn-outline-light btn-social" href="{{ $setting->twitter }}" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif
                    
                    @if(!empty($setting->linkedin))
                        <a class="btn btn-outline-light btn-social" href="{{ $setting->linkedin }}" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @endif

                    @if(!empty($setting->instagram))
                        <a class="btn btn-outline-light btn-social" href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>

            {{-- Popular Links --}}
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <h5 class="text-white mb-4">Popular Link</h5>
                <a class="btn btn-link" href="{{ url('/') }}">Home</a>
                <a class="btn btn-link" href="{{ url('/about-us/Company-Overview') }}">About Us</a>
                <a class="btn btn-link" href="{{ url('/contact') }}">Contact Us</a>
                <a class="btn btn-link" href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                <a class="btn btn-link" href="{{ url('/terms-condition') }}">Terms & Condition</a>
                <!--<a class="btn btn-link" href="{{ url('projects') }}">Project</a>-->
            </div>

            {{-- Services --}}
            <!--<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">-->
            <!--    <h5 class="text-white mb-4">Our Services</h5>-->
            <!--    @if(isset($services) && $services->count())-->
            <!--        @foreach($services as $service)-->
            <!--            <a class="btn btn-link" href="">{{ $service->title }}</a>-->
            <!--        @endforeach-->
            <!--    @endif-->
            <!--</div>-->
             <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
            <h5 class="text-white mb-4">Our Services</h5>
            
           
                <a class="btn btn-link" href="{{ url('/service/Human-Resource-Services') }}">
                    Human Resource Services
                </a>
                <a class="btn btn-link" href="{{ url('/service/Cloud-Services') }}">
                    Cloud Services
                </a>
                <a class="btn btn-link" href="{{ url('/ai-powered-business-solutions') }}">
                    AI Powered Business Solutions
                </a>
                <a class="btn btn-link" href="{{ url('/service/Analytics-Services') }}">
                    Analytics Services
                </a>
                <a class="btn btn-link" href="{{ url('/service/High-Tech-Solutions') }}">
                    High Tech Solutions
                </a>
            


        </div>


        </div>
    </div>

    {{-- Footer Bottom --}}
     <!--wow fadeIn" data-wow-delay="0.1s"-->
    <div class="container">
    <div class="copyright">
        <div class="row">
            <div class="col-12 text-center">
                &copy;
                <a class="border-bottom" href="{{url('/')}}">
                   2025 {{ isset($setting->site_name) ? $setting->site_name : 'AI.Tech' }}
                </a>All Rights Reserved.
            </div>
        </div>
    </div>
</div>

</div>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{!! asset('public/front-end/lib/wow/wow.min.js')!!}"></script>
    <script src="{!! asset('public/front-end/lib/easing/easing.min.js')!!}"></script>
    <script src="{!! asset('public/front-end/lib/waypoints/waypoints.min.js')!!}"></script>
    <script src="{!! asset('public/front-end/lib/counterup/counterup.min.js')!!}"></script>
    <script src="{!! asset('public/front-end/lib/owlcarousel/owl.carousel.min.js')!!}"></script>

    <!-- Template Javascript -->
    <script src="{!! asset('public/front-end/js/main.js')!!}"></script>
    
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>