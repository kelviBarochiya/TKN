@extends('layouts.app')
{{dd('call')}}
@section('content')
{{-- <div class="col-lg-4 col-md-4 order-1"> --}}
  <div class="row">
    <div class="col-lg-4 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{!! asset('public/img/icons/unicons/chart-success.png')!!}"
                alt="chart success"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Page</span>
         
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{!! asset('public/img/icons/unicons/wallet-info.png')!!}"
                alt="Credit Card"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Service</span>
         
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{!! asset('public/img/icons/unicons/wallet-info.png')!!}"
                alt="Credit Card"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Gallery</span>
          
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{!! asset('public/img/icons/unicons/wallet-info.png')!!}"
                alt="Credit Card"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Contact</span>
          
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{!! asset('public/img/icons/unicons/wallet-info.png')!!}"
                alt="Credit Card"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Testimonial</span>
          
        </div>
      </div>
    </div>
  </div>
{{-- </div> --}}
@endsection