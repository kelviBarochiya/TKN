@extends('layouts.app')

@section('content')

    <div class="layout-container">
            <div class="content-wrapper">
                    <div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-primary alert-block text-white" id="primary-alert">
                                <strong class="validation_message">{{ $message }}</strong>
                            </div>
                        @endif  
                    </div>
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Change Password</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                              
                            </div>
                            <div class="card-body">
                              <form action="{{ route('save_change_password') }}" method="post" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="mb-3">
                                <label for="title" class="form-label">Old Password:</label>
                                <input type="password" class="form-control" id="old_password" placeholder="Enter old password"
                                    name="old_password"
                                    value="">
                                </div>
                                
                                <div class="mb-3">
                                <label for="title" class="form-label">New Password:</label>
                                <input type="password" class="form-control" id="new_password" placeholder="Enter new password"
                                    name="new_password"
                                    value=""> 
                                </div>

                                <div class="mb-3">
                                <label for="title" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirm_password" placeholder="Enter confirm password"
                                    name="confirm_password"
                                    value=""> 
                                </div>
                                
                                <input type="submit" class="btn btn-primary" value="Change Password">
                              </form>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                             
    </div>
    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });
    </script>
@endsection


  