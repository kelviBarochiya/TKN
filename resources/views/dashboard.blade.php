@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

                <div class="col-lg-12 col-md-4 order-1">
                    <div class="row">
                    
                            {{-- <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success"
                                                    class="rounded" />
                                            </div>
                                        </div>
                                        <a href="{{ route('categories.index') }}"><span
                                                class="fw-semibold d-block mb-1">Categories</span></a>
                                        <h3 class="card-title mb-2">{{ $categoriesCount }}</h3>
                                    </div>
                                </div>
                            </div> --}}
                       
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success"
                                                    class="rounded" />
                                            </div>
                                        </div>
                                        <a href="{{ url('services') }}"><span
                                                class="fw-semibold d-block mb-1">Service</span></a>
                                        <h3 class="card-title mb-2">{{ \App\Models\Service::where('status','1')->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success"
                                                    class="rounded" />
                                            </div>
                                        </div>
                                        <a href="{{ url('pages') }}"><span
                                                class="fw-semibold d-block mb-1">Pages</span></a>
                                        <h3 class="card-title mb-2">{{ \App\Models\Page::where('status','1')->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-3 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{!! asset('public/chart-success.png') !!}" alt="chart success"
                                                    class="rounded" />
                                            </div>
                                        </div>
                                        <a href="{{ url('enquiries') }}"><span
                                                class="fw-semibold d-block mb-1">Enquiries</span></a>
                                        <h3 class="card-title mb-2">{{ \DB::table('inquiries')->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>
@endsection
