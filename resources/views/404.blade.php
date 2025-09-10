@include('front-end.header')

<section>
    <div class="w3layouts-banner-slider-1 stickyTop">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bannerT">
                    <h2>404</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Error 404 Template -->
<section class="error-section">
    <div class="container">
        <div class="error-container">
            <h1>404 - Page Not Found</h1>
            <p>Sorry, the page you are looking for does not exist.</p>
            <a class="btn btn-warning" href="{{ url('/') }}">Go back to homepage</a>
        </div>
    </div>
</section>

<!-- WhatsApp & Call Now Section -->
<div id="properties-section">
    <div class="bottomBtn" id="content-mobile">
        <div class="btn btn-whatsapp">
            <i class="fa fa-whatsapp"></i>
            <a href="https://wa.me/918010506030?text=Hello%20Auricity" style="color:#fff;">
                WhatsApp
            </a>
        </div>

        <div class="btn btn-call">
            <span class="glyphicon glyphicon-earphone"></span>
            <a href="tel:+918010506030" style="color:#fff;">
                Call Now
            </a>
        </div>
    </div>
</div>

@include('front-end.footer')

<style>
    /* General styles for the 404 page */
    .error-section {
        background-color: #f9f9f9;
        padding: 60px 0;
        text-align: center;
    }

    .error-container h1 {
        font-size: 4em;
        color: #333;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .error-container p {
        font-size: 1.2em;
        color: #777;
        margin-bottom: 30px;
    }

    .btn-error {
        /* background-color: #0088ff; */
        color: white;
        padding: 12px 30px;
        font-size: 1em;
        text-decoration: none;
        border-radius: 5px;
        /* transition: background-color 0.3s ease; */
    }

    .btn-error:hover {
        background-color: #0056b3;
        text-decoration: none;
    }

    /* Mobile WhatsApp and Call Now Button */
    #content-mobile {
        display: flex;
        justify-content: space-around;
        position: fixed;
        left: 10px;
        bottom: 10px;
        z-index: 999;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 30px;
        font-size: 1em;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn a {
        color: white;
        text-decoration: none;
    }

    .btn-whatsapp {
        background-color: #4FCE5D;
        color: white;
    }

    .btn-call {
        background-color: #0e72b7;
        color: white;
    }

    /* Hover effects */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-whatsapp:hover {
        background-color: #3cb34a;
    }

    .btn-call:hover {
        background-color: #095e9b;
    }
</style>
