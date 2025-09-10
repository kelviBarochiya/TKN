@extends('layouts.app')
@section('content')
<!-- Basic Bootstrap Table -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <a href="{{ route('page-detail.create') }}" class="btn btn-primary" style="display:block;float:right;">Add Page Detail</a>&nbsp;
            <a class="btn btn-danger" id="deleteDebtbtn" style="display:block;float:right;margin-right: 10px;">Delete</a>
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Page Detail Tables</h4>
      
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <div>
            @if ($message = Session::get('success'))
                <div class="alert alert-primary alert-block text-white" id="primary-alert">
                    <strong class="validation_message">{{ $message }}</strong>
                </div>
            @endif
        </div>
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
          <table class="table" id="image_setting">
            <thead>
              <tr>
                <th>Select All<br><input type="checkbox" class="allData"></th>
                <th>SRNO</th>
                <th>MODULE</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $count = 1;
                @endphp
                @if(isset($pageDetails) && !empty($pageDetails))
                 @foreach ($pageDetails as $item)
                    @php
                          
                        $status = "";
                        if($item->status == 1){
                            $status = "Active";
                            $class = "success";
                        }else{
                            $status = "In Active";
                            $class = "danger";
                        }
                       
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
                        <td>{{ $item->module ?? "" }}</td>
                        <td>
                            {{ $item->title ?? "" }}
                        </td>
                        <td>
                            {!! html_entity_decode($description) !!}
                        </td>
                        <td>
                            @if($item->image != "")
                                <img src="{!! asset("public/images/{$item->image}") !!}" height="50" width="50">
                            @else
                                <img src="{!! asset("public/images/default.png") !!}" height="50" width="50">
                            @endif
                        </td>
                        
                        <td><span class="badge bg-label-{{ $class }} me-1">{{ $status }}</span></td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('edit.page-detail',[$item->id]) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <a class="dropdown-item" href="{{ route('delete.page-detail',[$item->id]) }}"
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
                $('#image_setting').DataTable();
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
                        var ajax_url = "{{ route('delete_all_image_setting') }}";
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