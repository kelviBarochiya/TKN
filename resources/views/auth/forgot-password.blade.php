
@include('front-end.header')
<style>
    @media(max-width:767px) {
        .m-text-center {
            text-align: center;
        }

        .login-container {
            padding-left: 15px;
            padding-right: 15px;
        }

        input#btnSubmit {
            display: block;
            margin: auto !important;
        }
    }
</style>
<section>
    <div class="w3layouts-banner-slider-1 stickyTop">
        <div class="container">
            <div class="rows">
                <div class="col-md-12 bannerT">
                    <h2> <a href="{{ url('/') }}" target="_blank"> Home </a>/ Forgot Password</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contactbg">
    <div class="container  pad50 w3title1 login-container" style="width:87% !important;">
        <h1><span>Forgot password</span></h1>

        <div class="row ">
            <div class="col-md-3 margtop">

            </div>
            <div class="col-md-6 margtop">
                <form method="post" action="{{ route('password.email') }}">
                    @csrf
                    {{-- <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div> --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="Enter Your Email" required autofocus>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input  type="submit" id="btnSubmit" value="Email Password Reset Link" class="btn btn-warning" style="border:0;">

                </form>

            </div>
        </div>

        <div class="col-md-3 margtop">

        </div>

    </div>
    </div>
</section>
<!--contact-->

<!-- footer start here -->
<style>
    #content-mobile {
        display: block;
        position: fixed;
        left: 10px;
        bottom: 0px;
        z-index: 999;
    }
</style>

<div id="properties-section">
    <div class="bottomBtn" id="content-mobile">

        <div class="btn" style="background-color:#4FCE5D; color:white;">
            <i class="fa fa-whatsapp"></i><a
                href="https://api.whatsapp.com/send?phone=+91-9582275275&amp;text=Hi%20I%20am%20interested%20in%20Propshop.org.in%20">
                <span class="left_btn" style="color:#fff;">
                    WhatsApp
                </span>
            </a>
        </div>


        <div class="btn" style="background-color:#0e72b7; color:white;"><span
                class="glyphicon glyphicon-earphone"></span><a href="tel:+91-9643-353-535">
                <span class="left_btn" style="color:#fff;">
                    Call Now
                </span>
            </a>
        </div>

    </div>
</div>
@include('front-end.footer')
