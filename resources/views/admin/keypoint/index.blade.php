@extends('layouts.admin')
@section('title','Keypoint')
@section('content')

<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-md-12">
             <div class="card card-round">
                <div class="card-header project-details-card-header">
                   <div class="d-flex align-items-center">
                      <h4 class="project-details-card-header-title"><i class='bx bxs-carousel bx-tada' ></i> Keypoint</h4>
                      <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#create-keypoint-modal"><i class='bx bx-message-square-add bx-tada' ></i> Add New Keypoint</a>
                   </div>
                </div>
                <!--create client modal-->
                @include('admin.keypoint.create-keypoint-modal')
                <!--create client modal-->
                <div class="card-body">
                   <div class="table-responsive">
                      <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                         <div class="row">
                            <div class="col-sm-12">
                               <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                  <thead class="">
                                     <tr role="row">
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody id="keypoint-table-body"></tbody>
                           
                               </table>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@include('admin.keypoint.edit-keypoint-modal')


@endsection



@push('script')
<script>
    function loadKeypoints() {
        $.ajax({
            url: "{{ route('keypoint.list') }}",
            type: "GET",
            dataType: "json",
            success: function (response) {
                let rows = "";
                $.each(response, function (index, keypoint) {
                    rows += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${keypoint.title}</td>
                            <td>${keypoint.description}</td>
                            <td>
                                ${keypoint.icon ? `<img src="/storage/${keypoint.icon}" width="70" height="50">` : ''}
                            </td>
                            
                            <td>
                                ${keypoint.status
                                        ? `<a href="/dashboard/keypoints/toggle-status/${keypoint.id}" class="badge badge-success">Active</a>`
                                        : `<a href="/dashboard/keypoints/toggle-status/${keypoint.id}" class="badge badge-danger">Inactive</a>`
                                    }
                            </td>
                            <td>
                                <button class="btn btn-lg  edit-btn" data-id="${keypoint.id}" data-title="${keypoint.title}" data-description="${keypoint.description}" data-icon="${keypoint.icon}"><i class='bx bxs-edit'></i></button>
                                <button class="btn btn-lg delete-btn" data-id="${keypoint.id}"><i class='bx bx-trash-alt'></i></button>
                            </td>
                        </tr>
                    `;
                });
                $("#keypoint-table-body").html(rows);
            },
            error: function () {
                alert("Failed to load data.");
            }
        });
    }

    // Load data on page ready
    $(document).ready(function () {
        loadKeypoints();
    });

    $(document).on('submit', 'form[action="{{ route('keypoint.store') }}"]', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('keypoint.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status === 'success') {
                    // alert(response.message);
                    $('#create-keypoint-modal').modal('hide');
                    $('#create-keypoint-modal form')[0].reset();
                    // $('#logo_preview').src = "{{ asset('admin/assets/gallery.jpg') }}";
                    // Optionally reload table/list
                    loadKeypoints();
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        alert(value[0]);
                    });
                } else {
                    alert('Something went wrong');
                }
            }
        });
    });





    $(document).on("click", ".edit-btn", function () {
        let keypointId = $(this).data("id");
        $("#edit-keypoint-modal #edit_id").val($(this).data("id"));
        $("#edit-keypoint-modal #edit_title").val($(this).data("title"));
        $("#edit-keypoint-modal #edit_description").val($(this).data("description"));
        $("#edit-keypoint-modal #edit_logo_preview").attr("src", "/storage/" + $(this).data("icon"));

                // Store ID in a hidden field for update
        $("#edit-keypoint-modal").data("id", keypointId);

                // Show modal
        $("#edit-keypoint-modal").modal("show");
    });



    $("#updateKeypointForm").on("submit", function (e) {
        e.preventDefault();

        let keypointId = $("#edit_id").val();
        let formData = new FormData(this);

        $.ajax({
            url: "/dashboard/keypoints/" + keypointId + "/update",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // alert(response.message);
                $("#edit-keypoint-modal").modal("hide");
                // Reset form fields
                
                $('#edit-keypoint-modal form')[0].reset();

                // Reset preview image
                $("#logo_preview").attr("src", "{{ asset('admin/assets/gallery.jpg') }}");
                loadKeypoints(); // reload table
            },
            error: function () {
                alert("Update failed.");
            }
        });
    });





    $(document).on('click', '.delete-btn', function() {
        let keypointId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/dashboard/keypoints/${keypointId}`,  // your delete route
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Swal.fire(
                        //     'Deleted!',
                        //     response.message || 'Keypoint deleted successfully.',
                        //     'success'
                        // );
                        loadKeypoints(); // Refresh the table after delete
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Failed to delete keypoint.',
                            'error'
                        );
                    }
                });
            }
        });

    });


</script>

@endpush






