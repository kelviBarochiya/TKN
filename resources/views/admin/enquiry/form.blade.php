@extends('layouts.app')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Enquiry</h1>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        <strong>{{ $message }}</strong>
                    </div>
             @endif
 
            <div class="card card-primary">
                <form action="" method="post" style="padding: 25px;" enctype="multipart/form-data">
                        @csrf
                        @if (isset($enquiry))
                            <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}">
                        @endif

                       <div class="form-group" style="display:flex;">
                           <label for="Name">Name:</label>&nbsp;&nbsp;
                           <p>{{ $enquiry->name }}</p>
                       </div>

                       <div class="form-group" style="display:flex;">
                           <label for="Name">Email:</label>&nbsp;&nbsp;
                           <p>{{ $enquiry->email }}</p>
                       </div>

                       <div class="form-group" style="display:flex;">
                           <label for="Name">Mobile Number:</label>&nbsp;&nbsp;
                           <p>{{ $enquiry->mobile_number }}</p>
                       </div>

                       <div class="form-group" style="display:flex;">
                           <label for="Name">Subject:</label>&nbsp;&nbsp;
                           <p>{{ $enquiry->subject }}</p>
                       </div>

                       <div class="form-group" style="display:flex;">
                           <label for="Name">Message:</label>&nbsp;&nbsp;
                           <p>{{ $enquiry->description }}</p>
                       </div>


                       
                   </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.ckeditor').ckeditor();
  });
</script>


@endsection