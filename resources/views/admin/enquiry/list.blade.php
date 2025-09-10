@extends('layouts.app')
@section('content')
<!-- Basic Bootstrap Table -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <a class="btn btn-danger" id="deleteDebtbtn" style="display:block;float:right;margin-right: 10px;">Delete</a>
            <a class="btn btn-primary" href="{{ route('export_enquiries') }}"  style="display:block;float:right;margin-right: 10px;color:white;">Export</a>
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Enquiry Tables</h4>
      
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <!--<div>-->
        <!--    @if ($message = Session::get('success'))-->
        <!--        <div class="alert alert-primary alert-block text-white" id="primary-alert">-->
        <!--            <strong class="validation_message">{{ $message }}</strong>-->
        <!--        </div>-->
        <!--    @endif-->
        <!--</div>-->
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-stripped" id="service_list">
            <thead>
              <tr>
                <th>Select All<br><input type="checkbox" class="allData"></th>
                <th>SRNO</th>
                <th>Date</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>SUBJECT</th>
                <th>MESSAGE</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $count = 1;
                @endphp
                @if(isset($enquiry) && !empty($enquiry))
                 @foreach ($enquiry as $item)
                    @php 
                    if (strlen($item->description) <= 20) {
                            $description = $item->description;
                        } else {
                            $description = substr($item->description, 0, 20) . '...';
                        }
                    @endphp
                    <tr>
                        <td>
                            <input type='checkbox' name='multiple_check'
                            class='multiple_check' value={{ $item->id }}>
                            
                        </td>
                        <td>{{ $count }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td> {{ $item->name }}</td>
                        <td>
                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                        </td>
                       
                        <td>
                            {{ $item->subject }}
                          </td>
                          <td>
                              {{ $description }}
                          </td>
                        
                        
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('view.enquiry',[$item->id]) }}"
                                ><i class="bx bx-trash me-1"></i> View</a
                            >
                            <a class="dropdown-item" href="{{ route('delete.enquiry',[$item->id]) }}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                            >
                            </div>
                        </div>
                        </td>
                    </tr>
                    @php
                    $count++
                @endphp
                @endforeach
            @endif 
            </tbody>
          </table>
        </div>
      </div>
      
     
    </div>
</div>
    
        <script>
            $(document).ready(function()
            {
                $('#service_list').DataTable();
            });
        </script>    
        <script>
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        </script>
        <script>
            $(document).on('click', '.allData', function() {
                if ($('.allData').prop('checked')) {
                    $('.multiple_check').prop('checked', true);
                    $('.allData').prop('checked', true);
                } else {
                    $('.multiple_check').prop('checked', false);
                    $('.allData').prop('checked', false);
                }
            });

            $(document).on('click', '#deleteDebtbtn', function(e) {
                e.preventDefault();

                var jsAllSelectedIds = [];
                $("input:checkbox[name=multiple_check]:checked").each(function() {
                    jsAllSelectedIds.push($(this).val());
                });
                if (jsAllSelectedIds == '' || jsAllSelectedIds == null) {
                    alert('Please select atleast one record');
                    return false;
                } else {
                    if (confirm('Are you sure to delete this records?')) {
                        var ajax_url = "{{ route('delete_all_enquiry') }}";
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            type: "POST",
                            url: ajax_url,
                            data: {
                                'ids': jsAllSelectedIds
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response == 'success');
                                if (response == 'success') {
                                    $('.validation_message').text('master delete Successfully');
                                    location.reload();
                                } else if (response == 'failed') {
                                    var message = 'failed to delete records';
                                    var messageIcon = 'error';
                                }
                                // $('#success-alert').show();
                                // $('#success-alert').html(response);
                                // swal("Record deleted Successfully", "Well done, you pressed a button",
                                //     "success")
                                // location.reload();
                            }
                        });
                    }
                }

            });
        </script>
@endsection