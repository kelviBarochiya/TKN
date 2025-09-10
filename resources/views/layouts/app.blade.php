  @include('layouts.header')
  <div class="layout-page">

      @include('layouts.navbar')

      <div class="content-wrapper">

          <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                  @yield('content')
                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                  @if ($message = Session::get('error'))
                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Error',
                                  text: "{{ $message }}",
                                  timer: 4000,
                                  showConfirmButton: false
                              });
                          });
                      </script>
                  @endif
              </div>

          </div>

          @include('layouts.footer')
         