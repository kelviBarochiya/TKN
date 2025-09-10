@include('front-end.header')

 <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
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


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <!--<div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Contact Us</div>-->

            <!-- Add this above the form -->
    <div class="row mb-5">
        <!-- Left: Map -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="h-100 w-100">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2836.3173752534726!2d-73.74632601496621!3d41.59172009720841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dd442f3669923d%3A0x638887dfef63bcd8!2s248%20Buttonwood%20Way%2C%20Hopewell%20Junction%2C%20NY%2012533%2C%20USA!5e1!3m2!1sen!2sin!4v1748416757487!5m2!1sen!2sin" 
                    width="100%" 
                    height="100%" 
                    style="border:0; min-height: 300px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    
        <!-- Right: Contact Details -->
        <div class="col-lg-6 col-md-12 d-flex flex-column justify-content-center">
            <div class="p-4">
                <h5 class="text-primary mb-4">Contact Information</h5>
        
                {{-- Addresses --}}
               @php
    $addresses = array_filter([
        $contact->address1 ?? '',
        $contact->address2 ?? '',
        $contact->address3 ?? ''
    ]);
    $fullAddress = implode("\n", $addresses);
@endphp

<p class="mb-4 d-flex align-items-start">
    <i class="bi bi-geo-alt-fill text-primary me-3" style="font-size: 1.7rem;"></i>
    <span>{!! nl2br(e($fullAddress)) !!}</span>
</p>

        
                {{-- Mobile Numbers --}}
                @foreach (['mobile_number1', 'mobile_number2', 'mobile_number3'] as $field)
                    @if (!empty($contact->$field))
                        <p class="mb-4 d-flex align-items-center">
                            <i class="bi bi-telephone-fill text-primary me-3" style="font-size: 1.7rem;"></i>
                            <a href="tel:{{ $contact->$field }}" class="text-dark text-decoration-none">
                                {{ $contact->$field }}
                            </a>
                        </p>
                    @endif
                @endforeach
                
                {{-- Emails --}}
                @foreach (['email1', 'email2', 'email3'] as $field)
                    @if (!empty($contact->$field))
                        <p class="mb-4 d-flex align-items-center">
                            <i class="bi bi-envelope-fill text-primary me-3" style="font-size: 1.7rem;"></i>
                            <a href="mailto:{{ $contact->$field }}" class="text-dark text-decoration-none">
                                {{ $contact->$field }}
                            </a>
                        </p>
                    @endif
                @endforeach
        
        
            </div>
        </div>

    </div>


</div>

            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <!--<div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Contact Us</div>-->
                <h1 class="mb-4">If You Have Any Query, Please Contact Us</h1>
            </div>
            @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <!--<p class="text-center mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>-->
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form method="POST" action="{{ route('contact.store') }}">
    @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                       <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{ old('name') }}">
                <label for="name">Your Name</label>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" value="{{ old('email') }}">
                <label for="email">Your Email</label>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" value="{{ old('subject') }}">
                <label for="subject">Subject</label>
                @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            </div>
            <div class="col-md-6">
                                    <!--<div class="form-floating">-->
                                    <!--    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="mobile" value="{{ old('mobile') }}">-->
                                    <!--    <label for="mobile">Mobile Number</label>-->
                                    <!--    @error('mobile') <small class="text-danger">{{ $message }}</small> @enderror-->
                                    <!--</div>-->
                                    
                                    <!--<div class="form-floating">-->
                                    <!--    <input type="text" name="mobile" class="form-control" id="mobile"-->
                                    <!--        placeholder="+1 (415) 555-2671"-->
                                    <!--        value="{{ old('mobile') }}"-->
                                    <!--        pattern="^\+1\s?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$"-->
                                    <!--        title="+1 (XXX) XXX-XXXX format required">-->
                                    <!--    <label for="mobile">Your Contact</label>-->
                                    <!--    @error('mobile') <small class="text-danger">{{ $message }}</small> @enderror-->
                                    <!--</div>-->
                                    
                                    <div class="form-floating">
    <input type="text" name="mobile" class="form-control" id="mobile"
        placeholder="Enter mobile number"
        value="{{ old('mobile') }}"
        title="Enter a valid mobile number with 10 to 12 digits">
    <label for="mobile">Your Contact</label>
    @error('mobile') <small class="text-danger">{{ $message }}</small> @enderror
</div>


                                </div>
                                

                                <div class="col-12">
                                    <div class="form-floating">
                <textarea name="message" class="form-control" placeholder="Leave a message here" id="message" style="height: 150px">{{ old('message') }}</textarea>
                <label for="message">Message</label>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
                                </div>
                                <div class="form-group mb-3">
    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
    @error('g-recaptcha-response')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
     
@include('front-end.footer')