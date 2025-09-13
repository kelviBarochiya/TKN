@php
    $setting = \DB::table('settings')->first();
@endphp
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>TKN</title>

    <meta name="description" content="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{!! asset('public/vendor/fonts/boxicons.css') !!}" />
    <link rel="stylesheet" href="{!! asset('public/vendor/css/select2.min.css') !!}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{!! asset('public/vendor/css/core.css') !!}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{!! asset('public/vendor/css/theme-default.css') !!}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{!! asset('public/vendor/css/demo.css') !!}" />

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{!! asset('public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') !!}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('public/vendor/libs/apex-charts/apex-charts.css') !!}" />

    {{-- <link rel="stylesheet" href="{!! asset('public/vendor/css/jquery.dataTables.min.css') !!}" /> --}}

    <link rel="stylesheet" href="{!! asset('public/vendor/css/jquery-ui.min.css') !!}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Add this before closing </body> tag for JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

    <script>
         $(document).ready(function() {
        $('.select2').select2();
    });
    </script> --}}

    <style>
        .service-content h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .service-content p {
            font-size: 16px;
            line-height: 1.8;
        }

        .service-content ul {
            padding-left: 20px;
            margin-top: 10px;
        }

        .service-content ul li {
            margin-bottom: 10px;
        }

        .service-image img {
            border-radius: 8px;
            width: 100%;
        }

        .service-wrapper {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 30px;
        }

        @media (min-width: 992px) {
            .service-layout {
                display: flex;
                gap: 40px;
            }

            .service-image {
                flex: 1;
            }

            .service-content {
                flex: 1.5;
            }
        }

        #cke_notifications_area_description {
            display: none !important;
        }

        .highlight-input-group {
            display: flex;
            align-items: center;
        }

        .highlight-input-group .form-control {
            flex: 1;
            margin-right: 10px;
            /* Adjust spacing between input and button */
        }

        .highlight-input-group .btn {
            flex-shrink: 0;
        }
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js">
    </script>

    <!--<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>-->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmkKfPzRrQ5ar2fvg-539rxA8F2y99NF8&libraries=places">
    </script>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{!! asset('public/vendor/js/helpers.js') !!}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{!! asset('public/vendor/js/config.js') !!}"></script>

    <script src="{!! asset('public/ckeditor/ckeditor.js') !!}"></script>
    <script src="{!! asset('public/ckfinder/ckfinder.js') !!}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('dashboard') }}" class="app-brand-link">
                        {{-- @if (isset($setting) && isset($setting->logo))
                            <img src='{!! asset("public/images/{$setting->logo}") !!}' width="100">
                        @endif  --}}

                        <h1>TKN</h1>

                        <!--<h4>{{ $setting->site_name }}</h4>-->

                    </a>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->

                    <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>

                    </li>

                    @php
                        $canSeeHome =
                            (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) ||
                            getPermission('Projects', 'list') ||
                            getPermission('Testimonial', 'list') ||
                            getPermission('FAQ', 'list') ||
                            getPermission('Page Content', 'list');
                    @endphp

                    @if ($canSeeHome)
                        <li class="menu-item">
                            <a href="#" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Home</div>
                            </a>
                            <ul class="menu-sub">
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Projects', 'list'))
                                    <li class="menu-item">
                                        <a href="{{ url('projects') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Project</div>
                                        </a>
                                    </li>
                                @endif
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Testimonial', 'list'))
                                    <li class="menu-item">
                                        <a href="{{ url('testimonails') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Testimonial</div>
                                        </a>
                                    </li>
                                @endif

                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('FAQ', 'list'))
                                    <li class="menu-item">
                                        <a href="{{ url('faq') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">FAQ</div>
                                        </a>
                                    </li>
                                @endif

                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Page Content', 'list'))
                                    <li class="menu-item">
                                        <a href="{{ url('page-contents') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Page Content</div>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    {{-- <li class="menu-item">
                            <a href="#" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">About Us</div>
                            </a>
                            <ul class="menu-sub">
                                 <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                                    <a href="{{ url('pages/9/edit') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                        <div data-i18n="Analytics">Company Overview</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                                    <a href="{{ url('pages/10/edit') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                        <div data-i18n="Analytics">Mission and Vision</div>
                                    </a>
                                </li>
                                <!--<li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">-->
                                <!--    <a href="{{ url('pages/11/edit') }}" class="menu-link">-->
                                <!--        <i class="menu-icon tf-icons bx bx-home-circle"></i>-->
                                <!--        <div data-i18n="Analytics">Corporate Governance</div>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">-->
                                <!--    <a href="{{ url('pages/12/edit') }}" class="menu-link">-->
                                <!--        <i class="menu-icon tf-icons bx bx-home-circle"></i>-->
                                <!--        <div data-i18n="Analytics">Values and Ethics	</div>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                                    <a href="{{ url('pages/13/edit') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                        <div data-i18n="Analytics">Environmental Sustainability	</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                                    <a href="{{ url('pages/16/edit') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                        <div data-i18n="Analytics">Green IT	</div>
                                    </a>
                                </li>
                                <!--<li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">-->
                                <!--    <a href="{{ url('pages/15/edit') }}" class="menu-link">-->
                                <!--        <i class="menu-icon tf-icons bx bx-home-circle"></i>-->
                                <!--        <div data-i18n="Analytics">Work and Culture	</div>-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        </li> --}}


                    <!--<li-->
                    <!-- class="menu-item {{ Route::currentRouteName() == 'blogs.index' ? 'active' : '' }}">-->
                    <!-- <a href="{{ route('blogs.index') }}" class="menu-link">-->
                    <!--  <i class="menu-icon tf-icons bx bx-home-circle"></i>-->
                    <!--  <div data-i18n="Analytics">Blogs</div>-->
                    <!-- </a>-->
                    <!-- </li>-->

                    @php
                        $canSeeHome =
                            (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) ||
                            getPermission('Services', 'list');
                    @endphp

                    @if ($canSeeHome)

                        <li class="menu-item">
                            <a href="#" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Service</div>
                            </a>
                            <ul class="menu-sub">
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Services', 'list'))
                                    <li
                                        class="menu-item {{ Route::currentRouteName() == 'services.index' ? 'active' : '' }}">
                                        <a href="{{ url('services') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Services</div>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @php
                        $canSeeHome =
                            (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) ||
                            getPermission('Pages', 'list');
                    @endphp

                    @if ($canSeeHome)

                        <li class="menu-item">
                            <a href="#" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Pages</div>
                            </a>
                            <ul class="menu-sub">
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Pages', 'list'))
                                    <li
                                        class="menu-item {{ Route::currentRouteName() == 'pages.index' ? 'active' : '' }}">
                                        <a href="{{ route('pages.index') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Pages</div>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    <!--<li-->
                    <!-- class="menu-item">-->
                    <!--<a href="{{ url('why-people-like-us') }}" class="menu-link">-->
                    <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i>-->
                    <!--  <div data-i18n="Analytics">Why Choose us</div>-->
                    <!-- </a>-->
                    <!--</li>-->

                    <!--<li-->
                    <!--    class="menu-item">-->
                    <!--    <a href="{{ url('service-enquiries') }}" class="menu-link">-->
                    <!--        <i class="menu-icon tf-icons bx bx-home-circle"></i>-->
                    <!--        <div data-i18n="Analytics">Service Enquiries</div>-->
                    <!--    </a>-->
                    <!--</li>-->

                    <!--<li-->
                    <!--    class="menu-item">-->
                    <!--    <a href="{{ url('sliders') }}" class="menu-link">-->
                    <!--        <i class="menu-icon tf-icons bx bx-home-circle"></i>-->
                    <!--        <div data-i18n="Analytics">Slider</div>-->
                    <!--    </a>-->
                    <!--</li>-->
                    @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Newsletters', 'list'))
                        <li class="menu-item {{ Route::currentRouteName() == 'newsletter.index' ? 'active' : '' }}">
                            <a href="{{ route('newsletter.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Newsletter</div>
                            </a>
                        </li>
                    @endif
                    @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Downloads', 'list'))
                        <li class="menu-item {{ Route::currentRouteName() == 'downloads.index' ? 'active' : '' }}">
                            <a href="{{ route('downloads.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Downloads</div>
                            </a>
                        </li>
                    @endif
                    @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Roles', 'list'))
                        <li class="menu-item {{ Route::currentRouteName() == 'roles.index' ? 'active' : '' }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Roles</div>
                            </a>
                        </li>
                    @endif
                    @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Users', 'list'))
                        <li class="menu-item {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Users</div>
                            </a>
                        </li>
                    @endif

                    @php
                        $canSeeHome =
                            (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) ||
                            getPermission('Contact Us', 'list') ||
                            getPermission('Enquiries', 'list');
                    @endphp

                    @if ($canSeeHome)
                        <li class="menu-item">
                            <a href="#" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Contact</div>
                            </a>
                            <ul class="menu-sub">
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Contact Us', 'list'))
                                    <li
                                        class="menu-item {{ Route::currentRouteName() == 'contact-us.index' ? 'active' : '' }}">
                                        <a href="{{ route('contact-us.index') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Contact Us</div>
                                        </a>
                                    </li>
                                @endif
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Enquiries', 'list'))
                                    <li class="menu-item">
                                        <a href="{{ url('enquiries') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Enquiries</div>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @php
                        $canSeeHome =
                            (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) ||
                            getPermission('Settings', 'list') ||
                            getPermission('Image Settings', 'list') ||
                            getPermission('Meta Tags', 'list');
                    @endphp

                    @if ($canSeeHome)
                        <li class="menu-item">
                            <a href="#" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Setting</div>
                            </a>
                            <ul class="menu-sub">
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Settings', 'list'))
                                    <li
                                        class="menu-item {{ Route::currentRouteName() == 'settings.index' ? 'active' : '' }}">
                                        <a href="{{ route('settings.index') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Setting</div>
                                        </a>
                                    </li>
                                @endif
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Image Settings', 'list'))
                                    <li class="menu-item">
                                        <a href="{{ url('image-settings') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Image Setting</div>
                                        </a>
                                    </li>
                                @endif
                                @if ((isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) || getPermission('Meta Tags', 'list'))
                                    <li class="menu-item">
                                        <a href="{{ url('meta-tags') }}" class="menu-link">
                                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                            <div data-i18n="Analytics">Meta Tags</div>
                                        </a>
                                    </li>
                                @endif

                                {{-- <li class="menu-item">
                                <a href="{{ url('page-banners') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                    <div data-i18n="Analytics">Banner Image</div>
                                </a>
                            </li> --}}

                            </ul>
                        </li>
                    @endif

                </ul>
            </aside>
