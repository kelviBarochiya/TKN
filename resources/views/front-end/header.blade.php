@php 
$setting = \DB::table('settings')->first();
$services = \App\Models\Service::with('category')->get();
$categories = \App\Models\Category::with(['services' => function($query){
    $query->where('status', 1);
}])->get();
$description = "";
$aboutUsData = \DB::table('pages')->whereIn('title',['Company Overview','Mission and Vision','Environmental Sustainability','Green IT'])->get();
$generateMetaTags = generateMetaTags();
if(isset($generateMetaTags['description'])){
if (strlen($generateMetaTags['description']) <= 160) {
    $description = $generateMetaTags['description'];
} else {
    $description = substr($generateMetaTags['description'], 0, 160) . '...';
}
}else{
    $description = "";
}
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@if(isset($generateMetaTags)){{ $generateMetaTags['title'] ?? "" }}@endif</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="title" content="@if(isset($generateMetaTags)){{ $generateMetaTags['title'] ?? "" }}@endif">
    <meta name="description" content="@if(isset($description)){{ trim(strip_tags($description)) }} @endif"/>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{!! asset('public/front-end/lib/animate/animate.min.css')!!}" rel="stylesheet">
    <link href="{!! asset('public/front-end/lib/owlcarousel/assets/owl.carousel.min.css')!!}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{!! asset('public/front-end/css/bootstrap.min.css')!!}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{!! asset('public/front-end/css/style.css')!!}" rel="stylesheet">
    
    <style>
  @media (max-width: 768px) {
    .vision-img {
      float: none !important;
      display: block;
      margin: 10px 0 !important;
      width: 100% !important;
    }
  }

  .vision-img {
    float: right;
    margin-left: 15px;
    margin-bottom: 10px;
    width: 50%;
    height: auto;
  }

  p {
    text-align: justify;
  }
</style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top" style="top: -150px;background:#fff !important;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src='{!! asset("public/images/{$setting->logo}") !!}' class="img-fluid" >
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                        <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About Us</a>
                            <div class="dropdown-menu bg-light mt-2">
                                @if($aboutUsData->isNotEmpty())
                                    @foreach($aboutUsData as $categoriesKey => $categoriesValue)
                                        <a href="{{ route('front-end.single-about-us',[str_replace(' ','-',$categoriesValue->title)]) }}" class="dropdown-item">{{ $categoriesValue->title }}</a>
                                    @endforeach
                                @endif
                                
                            </div>
                        </div>
                        
                        
                       
                        <!--<div class="nav-item dropdown">-->
                        <!--    <a href="{{ route('front-end.services') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>-->
                        <!--    <div class="dropdown-menu bg-light mt-2">-->
                        <!--        @if($categories->isNotEmpty())-->
                        <!--            @foreach($categories as $categoriesKey => $categoriesValue)-->
                        <!--                <a href="{{ route('front-end.category-service',[str_replace(' ','-',$categoriesValue->name)]) }}" class="dropdown-item">{{ $categoriesValue->name }}</a>-->
                        <!--            @endforeach-->
                        <!--        @endif-->
                                
                        <!--    </div>-->
                        <!--</div>-->
                        
                        
                        
                        @foreach($categories as $category)
                            <div class=" nav-item dropdown dropdown-submenu">
                                
                                <a href="{{ route('front-end.category-service', str_replace(' ','-',$category->name)) }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ $category->name }}</a>
                                <div class="dropdown-menu bg-light mt-2">
                                    @if($category->services->isNotEmpty())
                                                   @foreach($category->services as $service)
                                                        <a href="{{ route('front-end.single-service', str_replace(' ','-',$service->title)) }}" class="dropdown-item"> {{ $service->title }}</a>
                                                    @endforeach
                                                @endif
                                                @if(strtolower(trim($category->name)) === strtolower('Consulting Solutions & Services'))
                                                    <a href="{{route('ai-powered-business-solutions')}}" class="dropdown-item">AI Powered Business Solutions</a>
                                                    <a href="{{route('data-analytics-and-predictive-intelligence')}}" class="dropdown-item">Data Analytics and Predictive Intelligence</a>
                                                    <a href="{{route('sustainable-digital-solutions')}}" class="dropdown-item">Sustainable Digital Solutions</a>
                                                    <a href="{{route('creative-ai-and-generative-design')}}" class="dropdown-item">Creative AI and Generative Design</a>
                                                    <a href="{{route('it-and-digital-transformation-solutions')}}" class="dropdown-item">IT and Digital Transformation Solutions</a>
                                                @endif
                                
                                </div>
                            </div>
                        @endforeach
                        
                        <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                    <butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
                        data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                </div>
                <div class="mobile-overlay" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"></div>
            </nav>
        </div>
    </div>
  